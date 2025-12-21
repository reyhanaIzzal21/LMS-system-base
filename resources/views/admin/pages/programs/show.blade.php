@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('programs.index') }}"
                class="text-slate-500 hover:text-[#5d87ff] flex items-center gap-2 text-sm mb-4 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- Header with thumbnail -->
            <div class="relative h-64 w-full bg-slate-100">
                @if ($program->thumbnail)
                    <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}"
                        class="w-full h-full object-cover">
                @else
                    <div
                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-200 to-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif

                <!-- Overlay badges -->
                <div class="absolute top-4 left-4 flex items-center gap-2">
                    @if ($program->category)
                        <span
                            class="bg-white/90 backdrop-blur-sm text-slate-700 text-sm font-bold px-3 py-1.5 rounded-full shadow-sm">
                            {{ $program->category->name }}
                        </span>
                    @endif
                    @if ($program->is_premium)
                        <span class="bg-amber-500 text-white text-sm font-bold px-3 py-1.5 rounded-full shadow-sm">
                            Premium
                        </span>
                    @endif
                </div>

                <div class="absolute top-4 right-4">
                    <span class="flex items-center gap-2 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm">
                        <span class="relative flex h-2.5 w-2.5">
                            @if ($program->is_active)
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                            @else
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-slate-400"></span>
                            @endif
                        </span>
                        <span class="text-sm font-medium {{ $program->is_active ? 'text-emerald-700' : 'text-slate-600' }}">
                            {{ $program->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h1 class="text-2xl font-bold text-slate-800 mb-2">{{ $program->title }}</h1>
                <p class="text-lg text-slate-500 mb-4">{{ $program->sub_title }}</p>

                <!-- Price section -->
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                    @if ($program->promotional_price)
                        <span class="text-xl text-slate-400 line-through">Rp
                            {{ number_format($program->price, 0, ',', '.') }}</span>
                        <span class="text-3xl font-bold text-[#5d87ff]">Rp
                            {{ number_format($program->promotional_price, 0, ',', '.') }}</span>
                    @else
                        <span
                            class="text-3xl font-bold {{ $program->price == 0 ? 'text-emerald-600' : 'text-slate-800' }}">
                            {{ $program->price == 0 ? 'Gratis' : 'Rp ' . number_format($program->price, 0, ',', '.') }}
                        </span>
                    @endif

                    @if ($program->end_date)
                        <span class="text-sm text-slate-500 bg-slate-100 px-3 py-1 rounded-full">
                            Berakhir: {{ $program->end_date->format('d M Y') }}
                        </span>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-800 mb-3">Deskripsi</h2>
                    <div class="prose prose-slate max-w-none">
                        {!! nl2br(e($program->description)) !!}
                    </div>
                </div>

                <!-- Benefits -->
                @if ($program->benefits->count() > 0)
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-3">Fasilitas & Benefits</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach ($program->benefits as $benefit)
                                <div class="flex items-center gap-3 p-3 bg-emerald-50 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 flex-shrink-0"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-slate-700">{{ $benefit->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
                    <a href="{{ route('programs.edit', $program->id) }}"
                        class="px-5 py-2.5 bg-[#5d87ff] hover:bg-[#4a70e0] text-white font-medium rounded-lg shadow-lg shadow-blue-500/30 transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Program
                    </a>

                    <button type="button"
                        onclick="openDeleteModal(
                            '{{ route('programs.destroy', $program->id) }}',
                            'Apakah anda yakin ingin menghapus <strong>{{ $program->title }}</strong>? Tindakan ini tidak dapat dibatalkan.')"
                        class="px-5 py-2.5 text-red-600 hover:bg-red-50 font-medium rounded-lg transition-all flex items-center gap-2 border border-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
