@extends('student.layouts.app')

@section('title')
    Dashboard Belajar Saya
@endsection


@section('content')
    <div class="lg:col-span-9 space-y-8">

        {{-- Welcome Message --}}
        <div
            class="relative bg-gradient-to-r from-primary-600 to-indigo-700 rounded-3xl p-8 md:p-10 text-white overflow-hidden shadow-xl shadow-primary-600/20">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="text-center md:text-left">
                    <h1 class="text-2xl md:text-4xl font-extrabold mb-2">Selamat Datang Kembali, Aditya! 👋</h1>
                    <p class="text-blue-100 text-lg mb-6">Kamu memiliki <strong>2 Tugas Pending</strong> yang harus
                        diselesaikan hari ini.</p>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3">
                        <button
                            class="px-6 py-2.5 bg-white text-primary-700 font-bold rounded-xl shadow-lg hover:bg-blue-50 transition flex items-center gap-2">
                            <i class="ph-bold ph-play-circle"></i> Lanjut Belajar
                        </button>
                        <button
                            class="px-6 py-2.5 bg-primary-800/50 text-white border border-white/20 font-bold rounded-xl hover:bg-primary-800 transition">
                            Lihat Jadwal
                        </button>
                    </div>
                </div>

                <div class="hidden md:block w-48">
                    <img src="https://cdn-web.ruangguru.com/brainacademy-web/public/assets/images/desktopHeroFreeBAIllustration.png?convert=png"
                        alt="Study" class="w-full drop-shadow-2xl animate-pulse" style="animation-duration: 4s;">
                </div>
            </div>
        </div>

        {{-- Card --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div
                class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-primary-300 transition group">
                <div
                    class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                    <i class="ph-fill ph-book-open text-xl"></i>
                </div>
                <span class="text-2xl font-bold text-slate-900">4</span>
                <span class="text-xs text-slate-500 font-medium uppercase">Kursus Aktif</span>
            </div>

            <div
                class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-green-300 transition group">
                <div
                    class="w-10 h-10 bg-green-50 text-green-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                    <i class="ph-fill ph-check-circle text-xl"></i>
                </div>
                <span class="text-2xl font-bold text-slate-900">12</span>
                <span class="text-xs text-slate-500 font-medium uppercase">Tugas Selesai</span>
            </div>

            <div
                class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-purple-300 transition group">
                <div
                    class="w-10 h-10 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                    <i class="ph-fill ph-certificate text-xl"></i>
                </div>
                <span class="text-2xl font-bold text-slate-900">2</span>
                <span class="text-xs text-slate-500 font-medium uppercase">Sertifikat</span>
            </div>

            <div
                class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-orange-300 transition group">
                <div
                    class="w-10 h-10 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                    <i class="ph-fill ph-clock text-xl"></i>
                </div>
                <span class="text-2xl font-bold text-slate-900">15j</span>
                <span class="text-xs text-slate-500 font-medium uppercase">Jam Belajar</span>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-slate-900">Lanjutkan Belajar</h3>
            </div>

            <div
                class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col md:flex-row gap-6 items-center">
                <div class="relative w-full md:w-64 h-40 md:h-36 flex-shrink-0 rounded-xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=2031&auto=format&fit=crop"
                        class="w-full h-full object-cover" alt="Course Thumb">
                    <div
                        class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <i class="ph-fill ph-play-circle text-4xl text-white"></i>
                    </div>
                </div>

                <div class="flex-1 w-full">
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span
                            class="bg-primary-50 text-primary-700 text-[10px] font-bold px-2 py-0.5 rounded border border-primary-100">PROGRAMMING</span>
                        <span class="text-xs text-slate-400">• Terakhir akses: 2 Jam lalu</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Mastering Laravel 12 & Tailwind CSS</h3>
                    <p class="text-sm text-slate-500 mb-4 line-clamp-1">Modul 4: Integrasi Payment Gateway dengan
                        Midtrans</p>

                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-2.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primary-600 rounded-full" style="width: 45%"></div>
                        </div>
                        <span class="text-xs font-bold text-slate-700">45%</span>
                    </div>
                </div>

                <div class="w-full md:w-auto">
                    <a href="#"
                        class="block w-full px-6 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-700 transition text-center whitespace-nowrap">
                        Lanjut Materi
                    </a>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-900">Kursus Lainnya</h3>
                    <a href="#" class="text-sm font-bold text-primary-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-4">
                    <div
                        class="bg-white p-3 rounded-xl border border-slate-200 flex gap-3 hover:bg-slate-50 transition cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?q=80&w=2070&auto=format&fit=crop"
                            class="w-20 h-20 rounded-lg object-cover" alt="Thumb">
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-slate-900 line-clamp-2 mb-1">Matematika Saintek:
                                Aljabar Linear</h4>
                            <p class="text-xs text-slate-500 mb-2">Modul 2/10</p>
                            <div class="h-1.5 bg-slate-100 rounded-full w-full">
                                <div class="h-full bg-green-500 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white p-3 rounded-xl border border-slate-200 flex gap-3 hover:bg-slate-50 transition cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                            class="w-20 h-20 rounded-lg object-cover" alt="Thumb">
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-slate-900 line-clamp-2 mb-1">Bahasa Inggris: TOEFL
                                Preparation</h4>
                            <p class="text-xs text-slate-500 mb-2">Modul 8/12</p>
                            <div class="h-1.5 bg-slate-100 rounded-full w-full">
                                <div class="h-full bg-orange-500 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-900">Jadwal Terdekat</h3>
                    <button class="text-slate-400 hover:text-slate-600"><i
                            class="ph-bold ph-calendar-blank text-xl"></i></button>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-1 divide-y divide-slate-100">
                    <div class="p-4 flex gap-4 hover:bg-slate-50 transition rounded-t-xl">
                        <div
                            class="flex flex-col items-center justify-center w-12 h-12 bg-red-50 text-red-600 rounded-xl border border-red-100 flex-shrink-0">
                            <span class="text-[10px] font-bold">DES</span>
                            <span class="text-lg font-bold leading-none">27</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span
                                    class="bg-red-100 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded-full animate-pulse">LIVE
                                    NOW</span>
                                <span class="text-xs text-slate-400">19:00 WIB</span>
                            </div>
                            <p class="text-sm font-bold text-slate-900">Bedah Soal UTBK Campuran</p>
                            <p class="text-xs text-slate-500">Zoom Meeting • Kak Budi</p>
                        </div>
                        <button
                            class="ml-auto w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:bg-primary-600 hover:text-white transition">
                            <i class="ph-bold ph-video-camera"></i>
                        </button>
                    </div>

                    <div class="p-4 flex gap-4 hover:bg-slate-50 transition rounded-b-xl">
                        <div
                            class="flex flex-col items-center justify-center w-12 h-12 bg-slate-50 text-slate-600 rounded-xl border border-slate-200 flex-shrink-0">
                            <span class="text-[10px] font-bold">JAN</span>
                            <span class="text-lg font-bold leading-none">02</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span
                                    class="bg-purple-100 text-purple-600 text-[10px] font-bold px-2 py-0.5 rounded-full">DEADLINE</span>
                                <span class="text-xs text-slate-400">23:59 WIB</span>
                            </div>
                            <p class="text-sm font-bold text-slate-900">Tugas Membuat Landing Page</p>
                            <p class="text-xs text-slate-500">Laravel Course</p>
                        </div>
                        <button
                            class="ml-auto w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:bg-primary-600 hover:text-white transition">
                            <i class="ph-bold ph-upload-simple"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
