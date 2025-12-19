@extends('teacher.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">My Courses</h1>
                <p class="text-slate-500 text-sm mt-1">Manage modules and content for your assigned courses.</p>
            </div>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($courses as $course)
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative">

                    <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                        @if ($course->photo)
                            <img src="{{ asset('storage/' . $course->photo) }}" alt="{{ $course->title }}"
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

                        <span
                            class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-700 text-xs font-bold px-3 py-1 rounded-full shadow-sm border border-slate-100">
                            {{ $course->category->name }}
                        </span>

                        <div class="absolute top-3 right-3">
                            <span class="relative flex h-3 w-3">
                                @if ($course->is_ready)
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
                        <div class="text-xs text-slate-500 mb-2 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $course->user->name }}
                        </div>

                        <h3 class="text-lg font-bold text-slate-800 leading-tight mb-3 line-clamp-2"
                            title="{{ $course->title }}">
                            {{ $course->title }}
                        </h3>

                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex flex-col">
                                @if ($course->promotional_price)
                                    <span class="text-xs text-slate-400 line-through">Rp
                                        {{ number_format($course->price, 0, ',', '.') }}</span>
                                    <span class="text-lg font-bold text-[#5d87ff]">Rp
                                        {{ number_format($course->promotional_price, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-xs text-slate-400">Price</span>
                                    <span class="text-lg font-bold text-slate-800">
                                        {{ $course->price == 0 ? 'Free' : 'Rp ' . number_format($course->price, 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>

                            @if ($course->is_premium)
                                <span
                                    class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">Premium</span>
                            @endif
                        </div>
                    </div>

                    <div class="bg-slate-50 p-3 px-5 flex items-center justify-between border-t border-slate-100">
                        {{-- Status Badge --}}
                        <span
                            class="px-3 py-1.5 text-xs font-semibold rounded-md border shadow-sm
                            {{ $course->is_ready
                                ? 'bg-emerald-100 text-emerald-700 border-emerald-200'
                                : 'bg-slate-200 text-slate-600 border-slate-300' }}">
                            {{ $course->is_ready ? 'Published' : 'Draft' }}
                        </span>

                        {{-- Manage Content Button --}}
                        <a href="{{ route('teacher.courses.show', $course->slug) }}"
                            class="flex items-center gap-2 px-4 py-2 bg-[#5d87ff] text-white text-sm font-medium rounded-lg hover:bg-[#4a70e0] transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Kelola Konten
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
                    <h3 class="text-lg font-bold text-slate-800">No Courses Assigned</h3>
                    <p class="text-slate-500 mb-6 text-center max-w-sm">You don't have any courses assigned yet. Please
                        contact admin to get courses assigned to you.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
