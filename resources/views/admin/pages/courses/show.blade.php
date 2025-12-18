@extends('admin.layouts.app')

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
    <div class="container mx-auto px-4 py-8 max-w-7xl" x-data="{ activeTab: 'deskripsi' }">

        <div class="flex items-center gap-3 text-sm text-slate-500 mb-6">
            <a href="{{ route('courses.index') }}" class="hover:text-[#5d87ff] transition">Courses</a>
            <span>/</span>
            <span class="text-slate-800 font-medium truncate max-w-xs">{{ $course->title }}</span>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-2 mb-6 sticky top-4 z-30">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                <nav class="flex space-x-1 overflow-x-auto w-full md:w-auto p-1 scrollbar-hide">
                    @php
                        $tabs = [
                            'deskripsi' => 'Deskripsi',
                            'modul' => 'Daftar Modul',
                            'test' => 'Test',
                            'voucher' => 'Voucher',
                            'statistik' => 'Statistik',
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

                    <a href="{{ route('courses.edit', $course->id) }}" x-show="activeTab === 'deskripsi'"
                        x-transition.opacity
                        class="flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Deskripsi
                    </a>

                    <button @click="$dispatch('open-create-module-modal')" x-show="activeTab === 'modul'"
                        x-transition.opacity
                        class="flex items-center gap-2 bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Modul
                    </button>

                    <button x-show="activeTab === 'test'" x-transition.opacity
                        class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan Test
                    </button>

                    <button x-show="activeTab === 'voucher'" x-transition.opacity
                        class="flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        Tambah Voucher
                    </button>

                    <button x-show="activeTab === 'statistik'" x-transition.opacity
                        class="flex items-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Export Data
                    </button>
                </div>
            </div>
        </div>

        <div class="relative min-h-[400px]">

            {{-- tab deskripsi --}}
            @include('admin.pages.courses.panes.description.tab-description')

            {{-- tab modul --}}
            @include('admin.pages.courses.panes.modules.tab-list-modules')

            {{-- tab test --}}
            @include('admin.pages.courses.panes.test.tab-list-test')

            {{-- tab voucher --}}
            @include('admin.pages.courses.panes.vouchers.tab-voucher')

            {{-- tab statistik --}}
            @include('admin.pages.courses.panes.statistic.tab-statistic')
        </div>
    </div>
@endsection
