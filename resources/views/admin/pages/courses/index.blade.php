@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">My Courses</h1>
                <p class="text-slate-500 text-sm mt-1">Manage, publish, and track your course catalog.</p>
            </div>
            <a href="{{ route('courses.create') }}"
                class="bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 transition-all duration-300 flex items-center gap-2 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add New Course</span>
            </a>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
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

                        <a href="{{ route('courses.show', $course->slug) }}"
                            class="text-slate-500 hover:text-[#5d87ff] transition-colors p-2 hover:bg-blue-50 rounded-full"
                            title="View Course">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

                        <button type="button"
                            onclick="openConfirmModal(
                                '{{ route('courses.set-ready', $course->id) }}',
                                '{{ $course->is_ready ? 'Jadikan Draft?' : 'Publish Course?' }}',
                                '{{ $course->is_ready ? 'Apakah anda yakin ingin mengubah status course ini menjadi Draft? Course tidak akan tampil di halaman user.' : 'Apakah anda yakin ingin mempublish course ini? Course akan tampil dan dapat diakses oleh user.' }}',
                                {{ $course->is_ready ? 0 : 1 }},
                                '{{ $course->is_ready ? 'Ya, Jadikan Draft' : 'Ya, Publish' }}',
                                '{{ $course->is_ready ? 'bg-slate-600 hover:bg-slate-700 shadow-slate-500/20' : 'bg-emerald-600 hover:bg-emerald-700 shadow-emerald-500/20' }}'
                            )"
                            class="px-3 py-1.5 text-xs font-semibold rounded-md transition-all border shadow-sm
                            {{ $course->is_ready
                                ? 'bg-emerald-100 text-emerald-700 border-emerald-200 hover:bg-emerald-200'
                                : 'bg-slate-200 text-slate-600 border-slate-300 hover:bg-slate-300' }}">
                            {{ $course->is_ready ? 'Published' : 'Draft' }}
                        </button>

                        <div class="relative">
                            <button onclick="toggleDropdown('dropdown-{{ $course->id }}')"
                                class="text-slate-400 hover:text-slate-700 p-2 hover:bg-slate-200 rounded-full transition-colors focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>

                            <div id="dropdown-{{ $course->id }}"
                                class="hidden absolute right-0 bottom-full mb-2 w-40 bg-white rounded-lg shadow-xl border border-slate-100 z-20 overflow-hidden dropdown-menu origin-bottom-right">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#5d87ff] transition-colors">
                                    Edit Course
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(
                                    '{{ route('courses.destroy', $course->id) }}',
                                    'Apakah anda yakin ingin menghapus <strong>{{ $course->title }}</strong>? Tindakan ini tidak dapat dibatalkan.')"
                                    class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors border-t border-slate-50">
                                    Delete
                                </button>
                            </div>
                        </div>

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
                    <h3 class="text-lg font-bold text-slate-800">No Courses Yet</h3>
                    <p class="text-slate-500 mb-6 text-center max-w-sm">You haven't created any courses. Start sharing your
                        knowledge today!</p>
                    <a href="{{ route('courses.create') }}"
                        class="bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-6 py-2 rounded-full shadow transition-all">
                        Create First Course
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('script')
    <script>
        // 1. LOGIC UNTUK DROPDOWN (Titik Tiga)
        function toggleDropdown(id) {
            // Tutup semua dropdown lain dulu
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu.id !== id) menu.classList.add('hidden');
            });

            // Toggle dropdown yang diklik
            const menu = document.getElementById(id);
            menu.classList.toggle('hidden');
        }

        // Close dropdown jika klik di luar
        window.onclick = function(event) {
            if (!event.target.closest('.relative')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (!menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                    }
                });
            }
        }
    </script>
@endsection
