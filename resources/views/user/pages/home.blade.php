@extends('user.layouts.app')

@section('style')
    <style>
        .hero-blob {
            position: absolute;
            filter: blur(80px);
            z-index: -1;
            /* opacity: 0.4; */
        }
    </style>
@endsection

@section('content')
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="hero-blob bg-blue-300 w-96 h-96 rounded-full top-0 left-[-100px]"></div>
        <div class="hero-blob bg-purple-300 w-96 h-96 rounded-full bottom-0 right-[-100px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div class="space-y-6 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-primary-700 rounded-full text-sm font-semibold border border-blue-100">
                        <span class="w-2 h-2 rounded-full bg-primary-600 animate-pulse"></span>
                        Platform Belajar Terpadu #1
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-tight">
                        Raih Prestasi & Masuk <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-indigo-600">PTN
                            Impian</span>
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Gabungan bimbel tatap muka terbaik dan teknologi LMS canggih. Belajar jadi lebih fleksibel,
                        terukur, dan menyenangkan bersama Super Teacher.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#"
                            class="w-full sm:w-auto px-8 py-4 bg-primary-600 text-white rounded-full font-bold hover:bg-primary-700 transition shadow-xl shadow-primary-600/30 flex items-center justify-center gap-2">
                            Mulai Belajar Gratis
                            <i class="ph-bold ph-arrow-right"></i>
                        </a>
                        <a href="#"
                            class="w-full sm:w-auto px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-full font-bold hover:bg-slate-50 transition flex items-center justify-center gap-2">
                            <i class="ph-fill ph-play-circle text-xl text-primary-600"></i>
                            Lihat Demo
                        </a>
                    </div>

                    <div
                        class="pt-6 flex items-center justify-center lg:justify-start gap-4 text-sm text-slate-500 font-medium">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-white"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-500 border-2 border-white"></div>
                        </div>
                        <p>Dipercaya oleh <span class="text-slate-900 font-bold">10.000+ Siswa</span></p>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-primary-600 to-indigo-600 rounded-3xl transform rotate-3 scale-95 opacity-20 group-hover:rotate-6 transition-transform duration-500">
                    </div>
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop"
                        alt="Happy Student Learning"
                        class="relative rounded-3xl shadow-2xl object-cover w-full h-[500px] border-4 border-white transform transition duration-500 hover:scale-[1.01]">

                    <div class="absolute bottom-10 left-[-20px] bg-white p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3 animate-bounce"
                        style="animation-duration: 3s;">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <i class="ph-fill ph-check-circle text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold">Lulus SNBT</p>
                            <p class="text-sm font-bold text-slate-900">Universitas Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 border-y border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm font-semibold text-slate-400 mb-6 uppercase tracking-wider">Telah Berhasil Mengantar Siswa
                ke Kampus Terbaik</p>
            <div
                class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <span class="text-2xl font-bold text-slate-800">UNIV INDONESIA</span>
                <span class="text-2xl font-bold text-slate-800">ITB</span>
                <span class="text-2xl font-bold text-slate-800">UGM</span>
                <span class="text-2xl font-bold text-slate-800">ITS</span>
                <span class="text-2xl font-bold text-slate-800">UNAIR</span>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Kenapa Memilih EduSmart?</h2>
                <p class="text-slate-600 text-lg">Metode belajar modern yang mengkombinasikan bimbingan personal dan
                    teknologi terkini.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                        <i class="ph-fill ph-monitor-play text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">LMS Terintegrasi</h3>
                    <p class="text-slate-500 leading-relaxed">Akses materi, video pembelajaran, dan latihan soal kapan
                        saja melalui sistem LMS kami yang canggih.</p>
                </div>

                <div
                    class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-accent-500 mb-6 group-hover:bg-accent-500 group-hover:text-white transition-colors">
                        <i class="ph-fill ph-chalkboard-teacher text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Super Teacher</h3>
                    <p class="text-slate-500 leading-relaxed">Diajar oleh lulusan PTN terbaik yang berpengalaman dan
                        cara mengajar yang asik, tidak membosankan.</p>
                </div>

                <div
                    class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <i class="ph-fill ph-chart-line-up text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Analisis Kemampuan</h3>
                    <p class="text-slate-500 leading-relaxed">Laporan perkembangan belajar (Report Card) yang detail
                        untuk mengetahui kelemahan dan kekuatan siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="programs" class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Peket Paling Popoular</h2>
                    <p class="text-slate-600">Pilih paket yang sesuai dengan kebutuhan dan targetmu.</p>
                </div>
                <a href="#" class="text-primary-600 font-bold hover:text-primary-700 flex items-center gap-2">
                    Lihat Semua Program <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="border border-slate-200 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            alt="Program Reguler">
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-slate-800">
                            KELAS 10-12 SMA
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Paket Reguler Super</h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Bimbingan intensif materi sekolah +
                            persiapan ujian harian. Cocok untuk menjaga nilai rapor.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> 2x Pertemuan / Minggu</li>
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> Akses Full LMS</li>
                        </ul>
                        <hr class="border-slate-100 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-slate-400 line-through">Rp 500.000</p>
                                <p class="text-lg font-bold text-primary-600">Rp 350.000<span
                                        class="text-xs font-normal text-slate-500">/bulan</span></p>
                            </div>
                            <button
                                class="w-10 h-10 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center hover:bg-primary-600 hover:text-white transition">
                                <i class="ph-bold ph-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    class="border-2 border-primary-500 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 relative transform md:-translate-y-4 bg-white">
                    <div class="bg-primary-600 text-white text-center text-xs font-bold py-1 uppercase tracking-widest">
                        Paling Laris</div>
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            alt="Program UTBK">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Paket Intensif UTBK</h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Fokus pembahasan soal-soal HOTS dan
                            strategi jitu menaklukkan SNBT & Ujian Mandiri.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> 4x Pertemuan / Minggu</li>
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> Tryout Rutin & Bahas</li>
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> Konsultasi Jurusan</li>
                        </ul>
                        <hr class="border-slate-100 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-slate-400 line-through">Rp 1.200.000</p>
                                <p class="text-lg font-bold text-primary-600">Rp 850.000<span
                                        class="text-xs font-normal text-slate-500">/bulan</span></p>
                            </div>
                            <button
                                class="px-4 py-2 rounded-lg bg-primary-600 text-white text-sm font-bold hover:bg-primary-700 transition">
                                Pilih Paket
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    class="border border-slate-200 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2132&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            alt="Program Privat">
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-slate-800">
                            SD - SMA
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Privat Executive</h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Satu guru satu siswa. Waktu fleksibel dan
                            materi disesuaikan dengan kebutuhan spesifik siswa.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> Jadwal Fleksibel</li>
                            <li class="flex items-center gap-2 text-sm text-slate-700"><i
                                    class="ph-fill ph-check text-green-500"></i> Request Guru Favorit</li>
                        </ul>
                        <hr class="border-slate-100 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-bold text-primary-600">Hubungi Kami<span
                                        class="text-xs font-normal text-slate-500"></span></p>
                            </div>
                            <button
                                class="w-10 h-10 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center hover:bg-primary-600 hover:text-white transition">
                                <i class="ph-bold ph-whatsapp-logo"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- section 'Temukan Cabang' start --}}
    {{-- section 'Temukan Cabang' end --}}

    {{-- section testimonial start (disini hanya menampilkan beberapa testimonial yang mana bisa di geser kesamping kiri dan kanan) --}}
    {{-- section testimonial end --}}

    {{-- section guru start (disini hanya menampilkan  guru yang mana bisa di geser kesamping kiri dan kanan) --}}
    {{-- section guru end --}}

    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto bg-primary-600 rounded-[3rem] p-8 md:p-16 relative overflow-hidden text-center">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-40 h-40 bg-accent-400 opacity-20 rounded-full -translate-x-1/2 translate-y-1/2">
            </div>

            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 relative z-10">Siap Jadi Juara Kelas?</h2>
            <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto relative z-10">Jangan tunda lagi. Bergabunglah
                dengan ribuan siswa lain yang telah merasakan perubahan cara belajar yang lebih efektif.</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 relative z-10">
                <a href="#"
                    class="px-8 py-4 bg-accent-500 hover:bg-accent-600 text-white rounded-full font-bold transition shadow-lg transform hover:scale-105">Daftar
                    Gratis Sekarang</a>
                <a href="#"
                    class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/30 rounded-full font-bold transition backdrop-blur-sm">Konsultasi
                    Dulu</a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-slate-900 text-center mb-12">Pertanyaan Sering Diajukan</h2>

            <div class="space-y-4">
                <div class="border border-slate-200 rounded-2xl overflow-hidden faq-item group">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-slate-50 transition focus:outline-none"
                        onclick="toggleFaq(this)">
                        <span class="font-bold text-slate-800">Apakah bisa mencoba kelas gratis (Trial)?</span>
                        <i class="ph-bold ph-caret-down text-slate-400 transform transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-6 pb-6 text-slate-600 leading-relaxed bg-slate-50">
                        Tentu saja! Kami menyediakan Free Trial Class selama 3 hari untuk akses LMS dan 1x pertemuan
                        tatap muka agar kamu bisa merasakan pengalaman belajar di EduSmart.
                    </div>
                </div>

                <div class="border border-slate-200 rounded-2xl overflow-hidden faq-item group">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-slate-50 transition focus:outline-none"
                        onclick="toggleFaq(this)">
                        <span class="font-bold text-slate-800">Bagaimana jika saya berhalangan hadir di kelas?</span>
                        <i class="ph-bold ph-caret-down text-slate-400 transform transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-6 pb-6 text-slate-600 leading-relaxed bg-slate-50">
                        Jangan khawatir. Setiap sesi kelas direkam dan diupload ke LMS. Kamu bisa menonton ulang rekaman
                        tersebut kapan saja. Selain itu, kamu bisa menjadwalkan kelas pengganti di hari lain.
                    </div>
                </div>

                <div class="border border-slate-200 rounded-2xl overflow-hidden faq-item group">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-slate-50 transition focus:outline-none"
                        onclick="toggleFaq(this)">
                        <span class="font-bold text-slate-800">Apakah LMS bisa diakses lewat HP?</span>
                        <i class="ph-bold ph-caret-down text-slate-400 transform transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-6 pb-6 text-slate-600 leading-relaxed bg-slate-50">
                        Sangat bisa! Website LMS kami sudah responsif dan didesain khusus agar nyaman digunakan di
                        Smartphone, Tablet, maupun Laptop.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // 3. Simple FAQ Accordion Logic
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');

            // Toggle Hidden Class
            content.classList.toggle('hidden');

            // Rotate Icon
            if (!content.classList.contains('hidden')) {
                icon.classList.add('rotate-180');
                button.classList.add('text-primary-600');
            } else {
                icon.classList.remove('rotate-180');
                button.classList.remove('text-primary-600');
            }
        }
    </script>
@endsection
