@extends('teacher.layouts.app')

@section('style')
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Style untuk konten Summernote */
        .summernote-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }

        .summernote-content iframe {
            max-width: 100%;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('teacher.courses.index') }}" class="hover:text-[#5d87ff]">Courses</a>
            <span>/</span>
            <a href="{{ route('teacher.modules.show', $subModule->module_id) }}"
                class="hover:text-[#5d87ff]">{{ $subModule->module->title }}</a>
            <span>/</span>
            <span class="text-slate-800 font-medium">{{ $subModule->title }}</span>
        </div>

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-[#5d87ff] font-bold text-lg">
                        {{ $subModule->step }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800 mb-1">{{ $subModule->title }}</h1>
                        <p class="text-slate-500">{{ $subModule->sub_title }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('teacher.sub-modules.edit', $subModule->id) }}"
                        class="px-4 py-2 bg-amber-400 hover:bg-amber-500 text-white rounded-lg transition text-sm font-medium flex items-center gap-2">
                        <i class="ti ti-edit"></i>
                        Edit
                    </a>
                    <a href="{{ route('teacher.modules.show', $subModule->module_id) }}"
                        class="px-4 py-2 bg-white border border-slate-300 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-medium flex items-center gap-2">
                        <i class="ti ti-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <h2 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b">Konten Materi</h2>
            <div class="prose prose-slate max-w-none summernote-content">
                {!! $subModule->content !!}
            </div>
        </div>
    </div>
@endsection
