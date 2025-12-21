@extends('user.layouts.app')

@section('name')
    Blog & Artikel - EduSmart
@endsection

@section('content')
    <section class="relative bg-slate-50 pt-32 pb-16 overflow-hidden border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4">
                Wawasan & <span class="text-primary-600">Inspirasi Belajar</span>
            </h1>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                Kumpulan artikel terbaru, tips belajar, latihan soal, dan panduan parenting untuk mendukung kesuksesan
                siswa.
            </p>
        </div>

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
            <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200 rounded-full blur-xl opacity-50"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-orange-200 rounded-full blur-xl opacity-50"></div>
        </div>
    </section>

    <section class="py-16 bg-white relative group">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="text-primary-600 font-bold tracking-wider text-sm uppercase">Fresh Update</span>
                    <h2 class="text-3xl font-bold text-slate-900 mt-1">Artikel Terbaru</h2>
                </div>
                <div class="flex gap-2">
                    <button id="slideLeft"
                        class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center hover:bg-slate-900 hover:text-white transition shadow-sm">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button id="slideRight"
                        class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center hover:bg-slate-900 hover:text-white transition shadow-sm">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

            <div id="latest-slider"
                class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar -mx-4 px-4 pb-8">

                <div class="min-w-[100%] md:min-w-[50%] px-3 snap-center flex-shrink-0">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden group/card cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2070&auto=format&fit=crop"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110"
                            alt="Blog Image">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-8 w-full">
                            <span
                                class="bg-primary-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">Tips
                                Belajar</span>
                            <h3
                                class="text-2xl font-bold text-white mb-3 leading-tight group-hover/card:text-primary-300 transition-colors">
                                Cara Mengatur Waktu Belajar di Tengah Padatnya Kegiatan Ekskul
                            </h3>
                            <div class="flex items-center gap-4 text-slate-300 text-sm">
                                <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Admin Edu</span>
                                <span class="flex items-center gap-1"><i class="ph-fill ph-calendar"></i> 20 Des 2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="min-w-[100%] md:min-w-[50%] px-3 snap-center flex-shrink-0">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden group/card cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110"
                            alt="Blog Image">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-8 w-full">
                            <span
                                class="bg-accent-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">Info
                                SNBT</span>
                            <h3
                                class="text-2xl font-bold text-white mb-3 leading-tight group-hover/card:text-accent-300 transition-colors">
                                Bedah Materi UTBK 2025: Apa Saja yang Harus Dipersiapkan?
                            </h3>
                            <div class="flex items-center gap-4 text-slate-300 text-sm">
                                <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Bu Guru Ani</span>
                                <span class="flex items-center gap-1"><i class="ph-fill ph-calendar"></i> 19 Des 2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="min-w-[100%] md:min-w-[50%] px-3 snap-center flex-shrink-0">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden group/card cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110"
                            alt="Blog Image">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-8 w-full">
                            <span
                                class="bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">Motivation</span>
                            <h3
                                class="text-2xl font-bold text-white mb-3 leading-tight group-hover/card:text-purple-300 transition-colors">
                                Mengatasi Burnout Saat Menghadapi Ujian Akhir Sekolah
                            </h3>
                            <div class="flex items-center gap-4 text-slate-300 text-sm">
                                <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Konselor Budi</span>
                                <span class="flex items-center gap-1"><i class="ph-fill ph-calendar"></i> 18 Des 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i
                            class="ph-fill ph-pencil-simple"></i></span>
                    Latihan Soal
                </h2>
                <a href="#"
                    class="group flex items-center gap-2 text-sm font-bold text-primary-600 hover:text-primary-700 transition">
                    Lihat Semua <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                            alt="Thumbnail">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="text-blue-600 font-bold bg-blue-50 px-2 py-0.5 rounded">Matematika</span>
                            <span>• 5 Menit Baca</span>
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-3 leading-snug hover:text-primary-600 transition cursor-pointer">
                            Pembahasan Soal Logaritma Tingkat Lanjut (HOTS)
                        </h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Kumpulan soal logaritma yang sering muncul di
                            seleksi mandiri PTN lengkap dengan kunci jawaban.</p>
                        <div class="mt-auto pt-4 border-t border-slate-50">
                            <a href="#" class="text-sm font-bold text-slate-900 hover:text-primary-600">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                            alt="Thumbnail">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="text-purple-600 font-bold bg-purple-50 px-2 py-0.5 rounded">Kimia</span>
                            <span>• 7 Menit Baca</span>
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-3 leading-snug hover:text-primary-600 transition cursor-pointer">
                            Rumus Cepat Stoikiometri untuk Ujian Nasional
                        </h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Pelajari cara menghitung mol dan massa zat
                            dengan metode jembatan keledai yang mudah diingat.</p>
                        <div class="mt-auto pt-4 border-t border-slate-50">
                            <a href="#" class="text-sm font-bold text-slate-900 hover:text-primary-600">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                            alt="Thumbnail">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded">Biologi</span>
                            <span>• 4 Menit Baca</span>
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-3 leading-snug hover:text-primary-600 transition cursor-pointer">
                            Sistem Pencernaan Manusia: Rangkuman Materi Lengkap
                        </h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">Ringkasan materi biologi kelas 11 tentang organ
                            pencernaan dan fungsinya masing-masing.</p>
                        <div class="mt-auto pt-4 border-t border-slate-50">
                            <a href="#" class="text-sm font-bold text-slate-900 hover:text-primary-600">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-lg"><i
                            class="ph-fill ph-heart"></i></span>
                    Counselling & Parenting
                </h2>
                <a href="#"
                    class="group flex items-center gap-2 text-sm font-bold text-primary-600 hover:text-primary-700 transition">
                    Lihat Semua <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="flex flex-col gap-4 group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden h-56 relative">
                        <img src="https://images.unsplash.com/photo-1536640712-4d4c36ff0e4e?q=80&w=1925&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Parenting">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition"></div>
                    </div>
                    <div>
                        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider mb-2 block">Untuk Orang
                            Tua</span>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-primary-600 transition">
                            Mengenali Gaya Belajar Anak: Visual, Auditori, atau Kinestetik?
                        </h3>
                        <p class="text-slate-500 text-sm line-clamp-2">Panduan bagi orang tua untuk mengarahkan metode
                            belajar yang paling efektif bagi buah hati.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-4 group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden h-56 relative">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1976&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Parenting">
                    </div>
                    <div>
                        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider mb-2 block">Psikologi
                            Remaja</span>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-primary-600 transition">
                            Membangun Komunikasi Efektif Antara Guru, Siswa, dan Orang Tua
                        </h3>
                        <p class="text-slate-500 text-sm line-clamp-2">Tips menjembatani gap komunikasi agar tercipta
                            lingkungan belajar yang suportif.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-4 group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden h-56 relative">
                        <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=1974&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Parenting">
                    </div>
                    <div>
                        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider mb-2 block">Info
                            Kampus</span>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-primary-600 transition">
                            Memilih Jurusan Kuliah Sesuai Minat dan Bakat (Bukan Ikut Teman)
                        </h3>
                        <p class="text-slate-500 text-sm line-clamp-2">Jangan sampai salah jurusan. Lakukan asesmen minat
                            bakat sederhana ini sebelum mendaftar kuliah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto bg-slate-900 rounded-3xl p-10 text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary-600 opacity-20 rounded-full blur-3xl"></div>

            <h2 class="text-2xl font-bold text-white mb-4 relative z-10">Dapatkan Artikel Terbaru via Email</h2>
            <p class="text-slate-400 mb-8 relative z-10">Kami mengirimkan rangkuman materi dan tips belajar setiap minggu.
            </p>

            <form class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto relative z-10">
                <input type="email" placeholder="Email kamu..."
                    class="w-full px-5 py-3 rounded-full bg-white/10 text-white border border-slate-700 focus:border-primary-500 focus:outline-none placeholder:text-slate-500">
                <button
                    class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-full transition">Subscribe</button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Logic untuk Slider Artikel Terbaru
        const slider = document.getElementById('latest-slider');
        const slideLeft = document.getElementById('slideLeft');
        const slideRight = document.getElementById('slideRight');

        slideLeft.addEventListener('click', () => {
            // Scroll ke kiri sebesar lebar container (1 slide view)
            slider.scrollBy({
                left: -slider.clientWidth, // Scroll sejauh lebar layar yang terlihat
                behavior: 'smooth'
            });
        });

        slideRight.addEventListener('click', () => {
            // Scroll ke kanan
            slider.scrollBy({
                left: slider.clientWidth,
                behavior: 'smooth'
            });
        });

        // Optional: Hide/Show buttons based on scroll position (UX Enhancement)
        slider.addEventListener('scroll', () => {
            // Logic tambahan jika ingin menyembunyikan tombol saat mentok kiri/kanan
            // (Bisa dikembangkan nanti)
        });
    </script>
@endsection
