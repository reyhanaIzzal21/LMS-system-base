@extends('teacher.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Programs</h1>
                <p class="text-slate-500 text-sm mt-1">Kelola program bimbel dan kursus Anda.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @forelse($programs as $program)
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative">

                    <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                        @if ($program->thumbnail)
                            <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif

                        @if ($program->category)
                            <span
                                class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-700 text-xs font-bold px-3 py-1 rounded-full shadow-sm border border-slate-100">
                                {{ $program->category->name }}
                            </span>
                        @endif

                        <div class="absolute top-3 right-3">
                            <span class="relative flex h-3 w-3">
                                @if ($program->is_active)
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                                @else
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-slate-400"></span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex-grow flex flex-col">
                        <h3 class="text-lg font-bold text-slate-800 leading-tight mb-2 line-clamp-2"
                            title="{{ $program->title }}">
                            {{ $program->title }}
                        </h3>
                        <p class="text-sm text-slate-500 mb-3 line-clamp-2">{{ $program->sub_title }}</p>

                        @if ($program->benefits->count() > 0)
                            <div class="mb-3">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($program->benefits->take(3) as $benefit)
                                        <span
                                            class="text-xs bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">{{ Str::limit($benefit->name, 15) }}</span>
                                    @endforeach
                                    @if ($program->benefits->count() > 3)
                                        <span
                                            class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">+{{ $program->benefits->count() - 3 }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex flex-col">
                                @if ($program->promotional_price)
                                    <span class="text-xs text-slate-400 line-through">Rp
                                        {{ number_format($program->price, 0, ',', '.') }}</span>
                                    <span class="text-lg font-bold text-[#5d87ff]">Rp
                                        {{ number_format($program->promotional_price, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-xs text-slate-400">Harga</span>
                                    <span class="text-lg font-bold text-slate-800">
                                        {{ $program->price == 0 ? 'Gratis' : 'Rp ' . number_format($program->price, 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>

                            @if ($program->is_premium)
                                <span
                                    class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">Premium</span>
                            @endif
                        </div>
                    </div>

                    <div class="bg-slate-50 p-3 px-5 flex items-center justify-between border-t border-slate-100">

                        <a href="{{ route('teacher.programs.show', $program->slug) }}"
                            class="w-full bg-blue-600 text-white p-2 rounded-lg flex justify-center items-center text-md"
                            title="Lihat Detail">
                            <i class="ti ti-eye text-xl"></i>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full flex flex-col items-center justify-center py-16 bg-white rounded-xl border border-dashed border-slate-300">
                    <div class="bg-blue-50 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#5d87ff]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800">Belum Ada Program</h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('script')
@endsection
