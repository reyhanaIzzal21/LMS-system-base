@extends('teacher.layouts.app')

@section('style')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl" x-data="{ activeTab: 'materi' }">

        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('teacher.courses.index') }}" class="hover:text-[#5d87ff]">Courses</a>
            <span>/</span>
            <span class="text-slate-800 font-medium">Detail Modul</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-8 relative overflow-hidden">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50 pointer-events-none">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span
                            class="bg-blue-100 text-[#5d87ff] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            Step {{ $module->step }}
                        </span>
                        <span class="text-slate-400 text-sm">Last updated: {{ $module->updated_at->diffForHumans() }}</span>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-800 mb-1">{{ $module->title }}</h1>
                    <p class="text-slate-500 text-lg">{{ $module->sub_title }}</p>
                </div>

                <div class="flex gap-4">
                    <div class="text-center px-4 py-2 bg-slate-50 rounded-lg border border-slate-100">
                        <span class="block text-2xl font-bold text-slate-800">{{ $module->subModules->count() }}</span>
                        <span class="text-xs text-slate-500 uppercase font-semibold">Materi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6 sticky top-4 z-30">

            <div class="bg-white/80 backdrop-blur-md p-1.5 rounded-xl border border-slate-200 shadow-sm flex gap-1">
                <button @click="activeTab = 'materi'"
                    :class="activeTab === 'materi' ? 'bg-[#5d87ff] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                    class="px-6 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                    Materi
                </button>
            </div>

            <div class="flex items-center gap-3">
                <button onclick="window.history.back()"
                    class="px-4 py-2.5 bg-white border border-slate-300 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </button>

                <div x-show="activeTab === 'materi'" x-cloak class="flex gap-2">
                    <a href="{{ route('teacher.sub-modules.create', $module->id) }}"
                        class="px-5 py-2.5 bg-[#5d87ff] hover:bg-[#4a70e0] text-white rounded-lg shadow-lg shadow-blue-500/30 transition text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Materi
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 min-h-[400px]">
            @include('teacher.pages.courses.panes.modules.panes.sub-module-list')
        </div>
    </div>
@endsection
