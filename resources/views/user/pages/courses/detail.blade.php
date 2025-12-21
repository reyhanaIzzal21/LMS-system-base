@extends('user.layouts.app')

@section('name')
    {{-- Dynamic Title dari Database --}}
    Mastering Laravel 12 & Tailwind CSS - EduSmart
@endsection

@section('content')
    <div class="bg-slate-900 pt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-6">
                <a href="#" class="hover:text-white transition">Home</a>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <a href="#" class="hover:text-white transition">Course</a>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <span class="text-white font-medium">Programming</span>
            </nav>

            <div class="lg:w-2/3">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
                    Mastering Laravel 12 & Tailwind CSS: Build Modern LMS from Scratch
                </h1>
                <p class="text-slate-300 text-lg mb-6 leading-relaxed">
                    Pelajari cara membangun website Learning Management System (LMS) yang kompleks dengan fitur Payment
                    Gateway, Role Management, dan Integrasi API.
                </p>

                <div class="flex flex-wrap items-center gap-6 text-sm text-slate-300">
                    <div class="flex items-center gap-1 text-yellow-400">
                        <span class="font-bold text-base">4.8</span>
                        <div class="flex text-xs">
                            <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i
                                class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-slate-400 ml-1">(120 Reviews)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-student"></i> 1,204 Siswa Terdaftar
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-clock"></i> Terakhir Diupdate: Des 2025
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-globe"></i> Bahasa Indonesia
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="relative py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">

                <div class="lg:col-span-2 space-y-12">

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 md:p-8">
                        <h2 class="text-xl font-bold text-slate-900 mb-6">Apa yang akan Anda pelajari?</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex gap-3">
                                <i class="ph-bold ph-check text-green-600 mt-1"></i>
                                <span class="text-slate-700 text-sm">Memahami Konsep MVC di Laravel 12</span>
                            </div>
                            <div class="flex gap-3">
                                <i class="ph-bold ph-check text-green-600 mt-1"></i>
                                <span class="text-slate-700 text-sm">Integrasi Payment Gateway (Midtrans/Xendit)</span>
                            </div>
                            <div class="flex gap-3">
                                <i class="ph-bold ph-check text-green-600 mt-1"></i>
                                <span class="text-slate-700 text-sm">Styling Cepat dengan Tailwind CSS v4</span>
                            </div>
                            <div class="flex gap-3">
                                <i class="ph-bold ph-check text-green-600 mt-1"></i>
                                <span class="text-slate-700 text-sm">Deploy Project ke VPS/Hosting</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Kurikulum Kursus</h2>

                        <div class="flex items-center justify-between text-sm text-slate-500 mb-4">
                            <span>8 Modul • 42 Materi • 10h 30m Total Durasi</span>
                            <button onclick="expandAll()" class="text-primary-600 font-bold hover:underline">Expand
                                All</button>
                        </div>

                        <div class="border border-slate-200 rounded-2xl overflow-hidden divide-y divide-slate-200 bg-white">

                            <div class="accordion-item" x-data="{ open: false }"> <button
                                    class="w-full flex items-center justify-between p-5 bg-slate-50 hover:bg-slate-100 transition text-left focus:outline-none"
                                    onclick="toggleAccordion(this)">
                                    <div class="flex items-center gap-3">
                                        <i class="ph-bold ph-caret-down transform transition-transform duration-300"></i>
                                        <span class="font-bold text-slate-900">Modul 1: Pendahuluan & Instalasi</span>
                                    </div>
                                    <span class="text-xs text-slate-500 font-medium">3 Materi • 15m</span>
                                </button>
                                <div class="accordion-content hidden">
                                    <ul class="divide-y divide-slate-100">
                                        <li class="flex items-center justify-between p-4 hover:bg-slate-50">
                                            <div class="flex items-center gap-3">
                                                <i class="ph-fill ph-play-circle text-primary-600 text-lg"></i>
                                                <a href="#"
                                                    class="text-sm text-slate-700 hover:text-primary-600">Perkenalan
                                                    Instructor & Goals</a>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <span
                                                    class="text-xs text-primary-600 font-bold border border-primary-100 bg-primary-50 px-2 py-0.5 rounded">Preview</span>
                                                <span class="text-xs text-slate-500">05:00</span>
                                            </div>
                                        </li>
                                        <li class="flex items-center justify-between p-4 hover:bg-slate-50">
                                            <div class="flex items-center gap-3">
                                                <i class="ph-fill ph-question text-orange-500 text-lg"></i>
                                                <span class="text-sm text-slate-700">Quiz: Pemahaman Dasar</span>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <i class="ph-fill ph-lock-key text-slate-300"></i>
                                                <span class="text-xs text-slate-500">5 Soal</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button
                                    class="w-full flex items-center justify-between p-5 bg-slate-50 hover:bg-slate-100 transition text-left focus:outline-none"
                                    onclick="toggleAccordion(this)">
                                    <div class="flex items-center gap-3">
                                        <i
                                            class="ph-bold ph-caret-down transform -rotate-90 transition-transform duration-300"></i>
                                        <span class="font-bold text-slate-900">Modul 2: Database & Migration</span>
                                    </div>
                                    <span class="text-xs text-slate-500 font-medium">5 Materi • 45m</span>
                                </button>
                                <div class="accordion-content hidden">
                                    <ul class="divide-y divide-slate-100">
                                        <li class="flex items-center justify-between p-4 hover:bg-slate-50">
                                            <div class="flex items-center gap-3">
                                                <i class="ph-fill ph-file-text text-purple-600 text-lg"></i>
                                                <span class="text-sm text-slate-700">Tugas: Merancang ERD</span>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <i class="ph-fill ph-lock-key text-slate-300"></i>
                                                <span class="text-xs text-slate-500">File Upload</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="prose prose-slate max-w-none">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4 no-underline">Deskripsi Kursus</h2>
                        <p class="text-slate-600 leading-relaxed mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.
                            Kursus ini didesain untuk pemula hingga tingkat lanjut. Anda akan belajar step-by-step.
                        </p>
                        <p class="text-slate-600 leading-relaxed">
                            Kenapa harus Laravel 12? Karena fitur barunya sangat memudahkan developer.
                            Dikombinasikan dengan Tailwind, Anda bisa membuat UI cantik dalam hitungan menit.
                        </p>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Instructor</h3>
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop"
                                class="w-16 h-16 rounded-full object-cover border border-slate-200" alt="Instructor">
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 hover:text-primary-600 cursor-pointer">Dr. Budi
                                    Santoso</h4>
                                <p class="text-primary-600 text-sm font-medium mb-2">Senior Fullstack Developer @ Tech
                                    Unicorn</p>
                                <div class="flex items-center gap-4 text-xs text-slate-500 mb-3">
                                    <span class="flex items-center gap-1"><i class="ph-fill ph-users"></i> 15,400
                                        Siswa</span>
                                    <span class="flex items-center gap-1"><i class="ph-fill ph-play-circle"></i> 12
                                        Kursus</span>
                                </div>
                                <p class="text-slate-600 text-sm leading-relaxed">
                                    Berpengalaman lebih dari 10 tahun di industri software development. Suka berbagi ilmu
                                    dengan cara yang santai dan mudah dimengerti.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden relative">

                            <div class="relative h-48 group cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=2031&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Course Thumbnail">
                                <div
                                    class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition flex items-center justify-center">
                                    <div
                                        class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                                        <i class="ph-fill ph-play text-primary-600 text-2xl ml-1"></i>
                                    </div>
                                </div>
                                <div class="absolute bottom-4 left-0 w-full text-center">
                                    <span class="text-white font-bold text-sm drop-shadow-md">Preview Course</span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="mb-6">
                                    <div class="flex items-end gap-2 mb-1">
                                        <span class="text-3xl font-extrabold text-slate-900">Rp 199.000</span>
                                        <span class="text-sm text-slate-400 line-through mb-1">Rp 450.000</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 text-red-500 text-xs font-bold bg-red-50 px-2 py-1 rounded inline-block">
                                        <i class="ph-fill ph-alarm"></i> Diskon 56% berakhir 2 hari lagi
                                    </div>
                                </div>

                                <div class="space-y-3 mb-6">
                                    <button
                                        class="w-full py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-lg shadow-primary-600/30 flex items-center justify-center gap-2">
                                        Beli Sekarang
                                    </button>
                                    <button
                                        class="w-full py-3 border border-slate-200 hover:border-slate-300 text-slate-700 font-bold rounded-xl transition flex items-center justify-center gap-2">
                                        <i class="ph-bold ph-heart"></i> Tambah ke Wishlist
                                    </button>
                                </div>

                                <div class="space-y-3 mb-6">
                                    <p class="text-xs font-bold text-slate-900 uppercase tracking-wider">Yang kamu
                                        dapatkan:</p>
                                    <ul class="text-sm text-slate-600 space-y-2">
                                        <li class="flex items-center gap-2"><i
                                                class="ph-fill ph-film-strip text-slate-400"></i> 10.5 Jam On-demand Video
                                        </li>
                                        <li class="flex items-center gap-2"><i
                                                class="ph-fill ph-file-arrow-down text-slate-400"></i> 5 Artikel & 12
                                            Downloadable Resource</li>
                                        <li class="flex items-center gap-2"><i
                                                class="ph-fill ph-device-mobile text-slate-400"></i> Akses di HP dan Laptop
                                        </li>
                                        <li class="flex items-center gap-2"><i
                                                class="ph-fill ph-infinity text-slate-400"></i> Akses Seumur Hidup</li>
                                        <li class="flex items-center gap-2"><i
                                                class="ph-fill ph-certificate text-yellow-500"></i> Sertifikat Kelulusan
                                        </li>
                                    </ul>
                                </div>

                                <div class="pt-4 border-t border-slate-100 text-center">
                                    <p class="text-[10px] text-slate-400 font-semibold mb-2">PEMBAYARAN AMAN DENGAN</p>
                                    <div
                                        class="flex justify-center items-center gap-3 opacity-60 grayscale hover:grayscale-0 transition duration-300">
                                        <i class="ph-fill ph-bank text-2xl" title="Bank Transfer"></i>
                                        <i class="ph-fill ph-qr-code text-2xl" title="QRIS"></i>
                                        <i class="ph-fill ph-credit-card text-2xl" title="Credit Card"></i>
                                        <i class="ph-fill ph-wallet text-2xl" title="E-Wallet"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center gap-4 text-slate-500">
                            <a href="#" class="flex items-center gap-2 text-sm hover:text-primary-600 transition">
                                <i class="ph-bold ph-share-network"></i> Bagikan
                            </a>
                            <a href="#" class="flex items-center gap-2 text-sm hover:text-primary-600 transition">
                                <i class="ph-bold ph-gift"></i> Gift Course
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Simple Accordion Logic without AlpineJS
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.ph-caret-down');

            // Toggle Hidden
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('-rotate-180'); // Rotate arrow up
            } else {
                content.classList.add('hidden');
                icon.classList.remove('-rotate-180'); // Rotate arrow down
            }
        }

        function expandAll() {
            const contents = document.querySelectorAll('.accordion-content');
            const icons = document.querySelectorAll('.ph-caret-down');

            contents.forEach(c => c.classList.remove('hidden'));
            icons.forEach(i => i.classList.add('-rotate-180'));
        }
    </script>
@endsection
