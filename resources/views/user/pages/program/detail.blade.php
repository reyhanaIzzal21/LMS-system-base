@extends('user.layouts.app')

@section('name')
    Program Intensif UTBK SNBT 2025 - EduSmart
@endsection

@section('content')
    <header class="bg-slate-900 pt-32 pb-20 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary-600 rounded-full blur-[150px] opacity-20 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-purple-600 rounded-full blur-[120px] opacity-10 pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-6">
                <a href="#" class="hover:text-white transition">Home</a>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <a href="#" class="hover:text-white transition">Program</a>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <span class="text-white font-medium">Persiapan PTN</span>
            </nav>

            <div class="max-w-3xl">
                <span
                    class="inline-block px-3 py-1 bg-accent-500 text-white text-xs font-bold rounded-full mb-4 uppercase tracking-wider shadow-lg shadow-accent-500/30">
                    INTENSIF UTBK
                </span>

                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                    Program Super Intensif UTBK SNBT 2025: Batch Gelombang 1
                </h1>
                <p class="text-slate-300 text-lg md:text-xl leading-relaxed mb-8">
                    Fokus taklukkan soal tipe skolastik dan literasi dengan metode "Conceptual Understanding" dalam 3 bulan
                    intensif.
                </p>

                <div class="flex flex-wrap gap-6 text-sm font-medium text-slate-300 border-t border-slate-700 pt-6">
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-users text-primary-400 text-xl"></i>
                        <span>145 Siswa Terdaftar</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-star text-yellow-400 text-xl"></i>
                        <span>4.9 (86 Review)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph-fill ph-certificate text-green-400 text-xl"></i>
                        <span>Sertifikat Resmi</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12 relative">

                <div class="lg:col-span-2 space-y-10">

                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Deskripsi Program</h2>
                        <div class="prose prose-slate prose-lg max-w-none text-slate-600">
                            <p>
                                Apakah kamu merasa kesulitan mengejar materi UTBK yang sangat banyak? Atau bingung harus
                                mulai belajar dari mana?
                                <strong>Program Super Intensif</strong> ini dirancang khusus untuk siswa kelas 12 dan gap
                                year yang ingin memaksimalkan sisa waktu sebelum ujian.
                            </p>
                            <p>
                                Kami tidak hanya mengajarkan cara menghafal rumus, tetapi membangun logika berpikir
                                (Reasoning) yang menjadi kunci utama soal-soal SNBT terbaru.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Apa yang Akan Kamu Dapatkan?</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">Akses LMS Premium Seumur Hidup</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">20x Tryout IRT System (Mirip Asli)</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">Live Class Zoom 4x Seminggu</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">Konsultasi Jurusan by Psikolog</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">Modul Cetak Eksklusif (Dikirim ke Rumah)</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="ph-bold ph-check"></i>
                                </div>
                                <span class="text-slate-700 font-medium">Grup Diskusi Discord 24 Jam</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Jadwal Pelaksanaan</h2>
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-1 bg-blue-50 rounded-xl p-5 border border-blue-100 flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-white text-primary-600 rounded-xl flex items-center justify-center text-2xl shadow-sm">
                                    <i class="ph-fill ph-calendar-plus"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase">Tanggal Mulai</p>
                                    <p class="text-lg font-bold text-slate-900">10 Januari 2025</p>
                                </div>
                            </div>
                            <div class="hidden md:flex items-center text-slate-300">
                                <i class="ph-bold ph-arrow-right text-2xl"></i>
                            </div>
                            <div
                                class="flex-1 bg-orange-50 rounded-xl p-5 border border-orange-100 flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-white text-orange-600 rounded-xl flex items-center justify-center text-2xl shadow-sm">
                                    <i class="ph-fill ph-calendar-check"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase">Tanggal Berakhir</p>
                                    <p class="text-lg font-bold text-slate-900">20 Mei 2025</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-start gap-2 text-sm text-slate-500">
                            <i class="ph-fill ph-info mt-0.5 text-primary-500"></i>
                            <p>Jadwal bisa menyesuaikan dengan pengumuman resmi SNPMB terbaru. Rekaman kelas tersedia jika
                                Anda berhalangan hadir.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-slate-900">Pertanyaan Umum</h2>
                        <div class="border border-slate-200 rounded-xl bg-white overflow-hidden">
                            <button
                                class="w-full flex justify-between items-center p-5 text-left font-bold text-slate-700 hover:bg-slate-50">
                                Apakah bisa dicicil?
                                <i class="ph-bold ph-caret-down"></i>
                            </button>
                        </div>
                        <div class="border border-slate-200 rounded-xl bg-white overflow-hidden">
                            <button
                                class="w-full flex justify-between items-center p-5 text-left font-bold text-slate-700 hover:bg-slate-50">
                                Bagaimana jika tidak lulus PTN?
                                <i class="ph-bold ph-caret-down"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden relative z-20">

                            <div class="relative h-56 group overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                    alt="Program Thumbnail">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                                    <span
                                        class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow-sm animate-pulse">
                                        <i class="ph-bold ph-alarm"></i> Sisa 3 Kuota!
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="mb-6">
                                    <p class="text-sm text-slate-500 mb-1 font-medium">Investasi Belajar:</p>
                                    <div class="flex items-end gap-2 flex-wrap">
                                        <span class="text-3xl font-extrabold text-primary-600">Rp 850.000</span>
                                        <span class="text-sm text-slate-400 line-through mb-1.5">Rp 1.200.000</span>
                                    </div>
                                    <p class="text-xs text-green-600 font-bold mt-1">Hemat Rp 350.000 (Diskon 29%)</p>
                                </div>

                                <button
                                    class="w-full py-4 bg-accent-500 hover:bg-accent-600 text-white font-bold rounded-xl transition shadow-lg shadow-accent-500/30 flex items-center justify-center gap-2 mb-4 transform hover:scale-[1.02]">
                                    Daftar Program Sekarang
                                    <i class="ph-bold ph-arrow-right"></i>
                                </button>

                                <p class="text-center text-xs text-slate-400 mb-6">Jaminan uang kembali 7 hari jika tidak
                                    puas</p>

                                <div class="border-t border-slate-100 pt-4">
                                    <p
                                        class="text-[10px] text-slate-400 font-bold uppercase mb-3 text-center tracking-wider">
                                        Metode Pembayaran</p>
                                    <div
                                        class="grid grid-cols-4 gap-2 opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                                        <div class="h-8 bg-slate-100 rounded flex items-center justify-center border border-slate-200"
                                            title="QRIS"><i class="ph-fill ph-qr-code text-xl"></i></div>
                                        <div class="h-8 bg-slate-100 rounded flex items-center justify-center border border-slate-200"
                                            title="GoPay"><i class="ph-fill ph-wallet text-xl"></i></div>
                                        <div class="h-8 bg-slate-100 rounded flex items-center justify-center border border-slate-200"
                                            title="Bank Transfer"><i class="ph-fill ph-bank text-xl"></i></div>
                                        <div class="h-8 bg-slate-100 rounded flex items-center justify-center border border-slate-200"
                                            title="Credit Card"><i class="ph-fill ph-credit-card text-xl"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 text-center">
                            <p class="text-sm font-bold text-slate-800 mb-1">Butuh bantuan mendaftar?</p>
                            <a href="#"
                                class="text-primary-600 text-sm font-bold hover:underline flex items-center justify-center gap-1">
                                <i class="ph-bold ph-whatsapp-logo"></i> Chat Admin via WA
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div
        class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 p-4 lg:hidden z-50 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs text-slate-400 line-through">Rp 1.200.000</p>
                <p class="text-xl font-bold text-primary-600">Rp 850.000</p>
            </div>
            <button class="flex-1 py-3 bg-accent-500 text-white font-bold rounded-lg shadow-lg">
                Daftar Sekarang
            </button>
        </div>
    </div>
@endsection
