@extends('admin.layouts.app')

@section('style')
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
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
    <div class="container mx-auto px-4 py-8 max-w-4xl">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('courses.index') }}" class="hover:text-[#5d87ff]">Courses</a>
            <span>/</span>
            <a href="{{ route('modules.show', $module->id) }}" class="hover:text-[#5d87ff]">{{ $module->title }}</a>
            <span>/</span>
            <span class="text-slate-800 font-medium">Tambah Materi Baru</span>
        </div>

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 mb-1">Tambah Materi Baru</h1>
                    <p class="text-slate-500">Buat materi baru untuk modul <span
                            class="font-medium text-slate-700">{{ $module->title }}</span></p>
                </div>
                <a href="{{ route('modules.show', $module->id) }}"
                    class="px-4 py-2 bg-white border border-slate-300 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-medium flex items-center gap-2">
                    <i class="ti ti-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <form action="{{ route('sub-modules.store', $module->id) }}" method="POST">
                @csrf

                <div class="space-y-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="w-full border border-slate-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                            placeholder="Masukkan judul materi" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sub Title --}}
                    <div>
                        <label for="sub_title" class="block text-sm font-medium text-slate-700 mb-2">Sub Title <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="sub_title" id="sub_title" value="{{ old('sub_title') }}"
                            class="w-full border border-slate-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sub_title') border-red-500 @enderror"
                            placeholder="Masukkan sub judul materi" required>
                        @error('sub_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div>
                        <label for="content" class="block text-sm font-medium text-slate-700 mb-2">Content <span
                                class="text-red-500">*</span></label>
                        <textarea name="content" id="summernote-editor" class="w-full">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <a href="{{ route('modules.show', $module->id) }}"
                            class="px-6 py-2.5 border border-slate-300 rounded-lg hover:bg-slate-50 transition font-medium text-slate-600">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] transition font-medium shadow-lg shadow-blue-500/30">
                            Simpan Materi
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote-editor').summernote({
                placeholder: 'Tulis konten materi di sini...',
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact',
                    'Tahoma', 'Times New Roman', 'Verdana'
                ],
            });
        });
    </script>
@endsection
