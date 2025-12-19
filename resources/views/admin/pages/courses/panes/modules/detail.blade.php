@extends('admin.layouts.app')

@section('style')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }

        .note-editor {
            border-radius: 0.5rem;
        }

        .note-editor .note-toolbar {
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl" x-data="{ activeTab: 'materi' }">

        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('courses.index') }}" class="hover:text-[#5d87ff]">Courses</a>
            <span>/</span>
            <a href="#" class="hover:text-[#5d87ff]">Modul Course</a>
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
                    <div class="text-center px-4 py-2 bg-slate-50 rounded-lg border border-slate-100">
                        <span class="block text-2xl font-bold text-slate-800">0</span>
                        <span class="text-xs text-slate-500 uppercase font-semibold">Tugas</span>
                    </div>
                    <div class="text-center px-4 py-2 bg-slate-50 rounded-lg border border-slate-100">
                        <span class="block text-2xl font-bold text-slate-800">0</span>
                        <span class="text-xs text-slate-500 uppercase font-semibold">Quiz</span>
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
                <button @click="activeTab = 'tugas'"
                    :class="activeTab === 'tugas' ? 'bg-[#5d87ff] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                    class="px-6 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                    Tugas
                </button>
                <button @click="activeTab = 'quiz'"
                    :class="activeTab === 'quiz' ? 'bg-[#5d87ff] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                    class="px-6 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                    Quiz
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
                    <button @click="$dispatch('open-create-submodule-modal')"
                        class="px-5 py-2.5 bg-[#5d87ff] hover:bg-[#4a70e0] text-white rounded-lg shadow-lg shadow-blue-500/30 transition text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Materi
                    </button>
                </div>

                <div x-show="activeTab === 'tugas'" x-cloak class="flex gap-2">
                    <button
                        class="px-5 py-2.5 bg-[#5d87ff] hover:bg-[#4a70e0] text-white rounded-lg shadow-lg shadow-blue-500/30 transition text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Tambah Tugas
                    </button>
                </div>

                <div x-show="activeTab === 'quiz'" x-cloak class="flex gap-2">
                    <button
                        class="px-4 py-2.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 border border-indigo-200 rounded-lg transition text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan Quiz
                    </button>
                    <button
                        class="px-5 py-2.5 bg-[#5d87ff] hover:bg-[#4a70e0] text-white rounded-lg shadow-lg shadow-blue-500/30 transition text-sm font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Quiz
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 min-h-[400px]">

            @include('admin.pages.courses.panes.modules.panes.sub-module-list')
            @include('admin.pages.courses.panes.modules.panes.quiz-module-list')
            @include('admin.pages.courses.panes.modules.panes.task-module-list')





        </div>
    </div>
@endsection

@section('script')
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection
