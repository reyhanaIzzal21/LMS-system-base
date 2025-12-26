@extends('admin.layouts.app')
{{-- Asumsi Anda punya layout admin terpisah. Jika tidak, sesuaikan dengan layout utama --}}

@section('title')
    Detail Program: Intensif UTBK SNBT 2025
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
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                                class="w-full h-full object-cover" alt="Thumbnail">
                        </div>
                    </div>

                    <div class="flex-1 w-full">
                        <div class="flex items-center gap-3 mb-3">
                            <span
                                class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wider border border-purple-200">
                                Intensif UTBK
                            </span>
                            <span
                                class="flex items-center gap-1 text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded border border-slate-200">
                                <i class="ti ti-calendar-clock"></i> Berakhir: 20 Mei 2025
                            </span>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Program Super Intensif UTBK SNBT 2025
                        </h1>
                        <p class="text-slate-500 text-lg mb-4">Batch Gelombang 1 - Fokus Skolastik & Literasi</p>

                        <div class="flex flex-wrap items-end gap-4 mt-auto">
                            <div>
                                <p class="text-xs text-slate-400 mb-1">Harga Program</p>
                                <div class="flex items-end gap-2">
                                    <span class="text-2xl font-bold text-primary-600">Rp 850.000</span>
                                    <span class="text-sm text-slate-400 line-through mb-1">Rp 1.200.000</span>
                                </div>
                            </div>

                            <div class="border-l border-slate-200 pl-4 ml-2">
                                <p class="text-xs text-slate-400 mb-1">Total Siswa</p>
                                <p class="text-xl font-bold text-slate-800">145 <span
                                        class="text-sm font-normal text-slate-500">Siswa</span></p>
                            </div>

                            <div class="border-l border-slate-200 pl-4">
                                <p class="text-xs text-slate-400 mb-1">Total Guru</p>
                                <p class="text-xl font-bold text-slate-800">8 <span
                                        class="text-sm font-normal text-slate-500">Pengajar</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('programs.index') }}"
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-arrow-left"></i> Back
                        </a>
                        <button
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-settings"></i> Settings
                        </button>
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
                        <span class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">8</span>
                    </a>

                    <a href="#students"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="students">
                        <i class="ti ti-users mr-2 text-lg"></i>
                        Data Siswa
                        <span class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">145</span>
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
@endsection

@section('script')
    @include('admin.pages.programs.script.show')
@endsection
