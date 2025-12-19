@extends('teacher.layouts.app')

@section('style')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Custom scrollbar untuk deskripsi panjang */
        .prose::-webkit-scrollbar {
            width: 6px;
        }

        .prose::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl" x-data="{ activeTab: 'modul' }">

        <div class="flex items-center gap-3 text-sm text-slate-500 mb-6">
            <a href="{{ route('teacher.courses.index') }}" class="hover:text-[#5d87ff] transition">Courses</a>
            <span>/</span>
            <span class="text-slate-800 font-medium truncate max-w-xs">{{ $course->title }}</span>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-2 mb-6 sticky top-4 z-30">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                <nav class="flex space-x-1 overflow-x-auto w-full md:w-auto p-1 scrollbar-hide">
                    @php
                        $tabs = [
                            'modul' => 'Daftar Modul',
                            'deskripsi' => 'Deskripsi',
                        ];
                    @endphp

                    @foreach ($tabs as $key => $label)
                        <button @click="activeTab = '{{ $key }}'"
                            :class="activeTab === '{{ $key }}'
                                ?
                                'bg-[#5d87ff] text-white shadow-md shadow-blue-500/30' :
                                'text-slate-500 hover:bg-slate-50 hover:text-slate-700'"
                            class="px-5 py-2.5 rounded-lg text-sm font-medium transition-all duration-300 whitespace-nowrap">
                            {{ $label }}
                        </button>
                    @endforeach
                </nav>

                <div class="w-full md:w-auto flex justify-end px-1" x-cloak>
                    <button @click="$dispatch('open-create-module-modal')" x-show="activeTab === 'modul'"
                        x-transition.opacity
                        class="flex items-center gap-2 bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Modul
                    </button>
                </div>
            </div>
        </div>

        <div class="relative min-h-[400px]">
            {{-- tab modul --}}
            @include('teacher.pages.courses.panes.modules.tab-list-modules')

            {{-- tab deskripsi --}}
            @include('teacher.pages.courses.panes.description.tab-description')
        </div>
    </div>
@endsection
