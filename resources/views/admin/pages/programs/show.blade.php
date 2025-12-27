@extends('admin.layouts.app')

@section('title')
    Detail Program: {{ $program->title }}
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.25rem;
            min-height: 42px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #7c3aed;
            border: none;
            color: white;
            border-radius: 0.375rem;
            padding: 0.25rem 0.5rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 0.25rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #fecaca;
        }

        .select2-dropdown {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .select2-results__option--highlighted[aria-selected] {
            background-color: #7c3aed !important;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen bg-slate-50 pb-20 mx-auto container max-w-7xl">

        {{-- header --}}
        <div class="bg-white border-b border-slate-200 shadow-sm z-20 mt-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row gap-8 items-start">

                    <div class="w-full md:w-64 flex-shrink-0">
                        <div
                            class="aspect-video rounded-xl overflow-hidden border border-slate-200 shadow-sm relative group">
                            @if ($program->thumbnail)
                                <img src="{{ asset('storage/' . $program->thumbnail) }}" class="w-full h-full object-cover"
                                    alt="{{ $program->title }}">
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                    <i class="ti ti-photo text-4xl text-slate-400"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 w-full">
                        <div class="flex items-center gap-3 mb-3">
                            @if ($program->category)
                                <span
                                    class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wider border border-purple-200">
                                    {{ $program->category->name }}
                                </span>
                            @endif
                            @if ($program->end_date)
                                <span
                                    class="flex items-center gap-1 text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded border border-slate-200">
                                    <i class="ti ti-calendar-clock"></i> Berakhir: {{ $program->end_date->format('d M Y') }}
                                </span>
                            @endif
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">{{ $program->title }}
                        </h1>
                        @if ($program->sub_title)
                            <p class="text-slate-500 text-lg mb-4">{{ $program->sub_title }}</p>
                        @endif

                        <div class="flex flex-wrap items-end gap-4 mt-auto">
                            <div>
                                <p class="text-xs text-slate-400 mb-1">Harga Program</p>
                                <div class="flex items-end gap-2">
                                    @if ($program->is_premium)
                                        @if ($program->promotional_price && $program->promotional_price > 0)
                                            <span class="text-2xl font-bold text-primary-600">Rp
                                                {{ number_format($program->promotional_price, 0, ',', '.') }}</span>
                                            <span class="text-sm text-slate-400 line-through mb-1">Rp
                                                {{ number_format($program->price, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-2xl font-bold text-primary-600">Rp
                                                {{ number_format($program->price, 0, ',', '.') }}</span>
                                        @endif
                                    @else
                                        <span class="text-2xl font-bold text-green-600">Gratis</span>
                                    @endif
                                </div>
                            </div>

                            <div class="border-l border-slate-200 pl-4 ml-2">
                                <p class="text-xs text-slate-400 mb-1">Total Siswa</p>
                                <p class="text-xl font-bold text-slate-800">0 <span
                                        class="text-sm font-normal text-slate-500">Siswa</span></p>
                            </div>

                            <div class="border-l border-slate-200 pl-4">
                                <p class="text-xs text-slate-400 mb-1">Total Guru</p>
                                <p class="text-xl font-bold text-slate-800">{{ $program->teachers->count() }} <span
                                        class="text-sm font-normal text-slate-500">Pengajar</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('programs.index') }}"
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('programs.edit', $program->id) }}"
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-settings"></i> Settings
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <nav class="flex space-x-8 border-b border-slate-200" aria-label="Tabs">
                    <a href="#description"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="description">
                        <i class="ti ti-file-text mr-2 text-lg"></i>
                        Deskripsi & Benefit
                    </a>

                    <a href="#teachers"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="teachers">
                        <i class="ti ti-chalkboard-teacher mr-2 text-lg"></i>
                        Daftar Guru
                        <span
                            class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">{{ $program->teachers->count() }}</span>
                    </a>

                    <a href="#students"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="students">
                        <i class="ti ti-users mr-2 text-lg"></i>
                        Data Siswa
                        <span class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">0</span>
                    </a>
                </nav>
            </div>
        </div>

        {{-- tab content --}}
        <div class="max-w-7xl mx-auto py-8">

            @include('admin.pages.programs.panes.description')
            @include('admin.pages.programs.panes.teacher')
            @include('admin.pages.programs.panes.student')

        </div>
    </div>

    {{-- Add Teacher Modal --}}
    @include('admin.pages.programs.partials.add-teacher-modal')
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('admin.pages.programs.script.show')
@endsection
