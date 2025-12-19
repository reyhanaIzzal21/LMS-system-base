@extends('admin.layouts.app')

@section('style')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-5xl">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('courses.index') }}" class="hover:text-[#5d87ff]">Courses</a>
            <span>/</span>
            <a href="{{ route('modules.show', $subModule->module_id) }}"
                class="hover:text-[#5d87ff]">{{ $subModule->module->title }}</a>
            <span>/</span>
            <span class="text-slate-800 font-medium">{{ $subModule->title }}</span>
        </div>

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <div class="flex items-start justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span
                            class="bg-blue-100 text-[#5d87ff] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            Step {{ $subModule->step }}
                        </span>
                        <span class="text-slate-400 text-sm">Updated {{ $subModule->updated_at->diffForHumans() }}</span>
                    </div>
                    <h1 class="text-2xl font-bold text-slate-800 mb-1">{{ $subModule->title }}</h1>
                    <p class="text-slate-500">{{ $subModule->sub_title }}</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="window.history.back()"
                        class="px-4 py-2 bg-white border border-slate-300 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-medium flex items-center gap-2">
                        <i class="ti ti-arrow-left"></i>
                        Kembali
                    </button>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <h2 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b">Konten Materi</h2>
            <div class="prose prose-slate max-w-none">
                {!! $subModule->content !!}
            </div>
        </div>

    </div>
@endsection
