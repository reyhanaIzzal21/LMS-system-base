@extends('user.layouts.app')

@section('name')
    Event & Webinar - EduSmart
@endsection

@section('content')
    <section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div
                class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-purple-600 rounded-full blur-[120px] opacity-20">
            </div>
            <div
                class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] bg-primary-600 rounded-full blur-[100px] opacity-20">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-white/10 text-white border border-white/20 text-xs font-bold mb-6 backdrop-blur-md">
                🎉 Gabung Komunitas Belajar
            </span>
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Upgrade Skill Lewat <br> <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-accent-400">Event & Webinar
                    Eksklusif</span>
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto mb-10">
                Temukan wawasan baru dari para ahli, diskusi interaktif, dan workshop praktis untuk menunjang prestasimu.
            </p>
        </div>
    </section>

    <section class="sticky top-[72px] z-30 bg-white/80 backdrop-blur-lg border-b border-slate-200 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center md:justify-start overflow-x-auto no-scrollbar py-4 gap-4">
                <button onclick="filterEvents('all')"
                    class="event-filter-btn active px-6 py-2 rounded-full text-sm font-bold transition-all bg-slate-900 text-white shadow-lg whitespace-nowrap">
                    Semua Event
                </button>
                <button onclick="filterEvents('live')"
                    class="event-filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all whitespace-nowrap flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> Sedang Berlangsung
                </button>
                <button onclick="filterEvents('upcoming')"
                    class="event-filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all whitespace-nowrap">
                    Akan Datang
                </button>
                <button onclick="filterEvents('ended')"
                    class="event-filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all whitespace-nowrap">
                    Selesai
                </button>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" id="event-grid">

                <div class="event-card group bg-white rounded-3xl border border-red-100 overflow-hidden hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-300 flex flex-col relative"
                    data-status="live">
                    <div
                        class="absolute top-4 left-4 z-20 flex items-center gap-2 px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full shadow-lg animate-pulse">
                        <i class="ph-fill ph-broadcast"></i> LIVE NOW
                    </div>

                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                        <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Event Thumbnail">

                        <div class="absolute bottom-4 left-4 z-20 text-white">
                            <p class="text-xs font-medium opacity-90">HARI INI</p>
                            <p class="text-xl font-bold">21 DES 2025</p>
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3 text-red-600 text-xs font-bold uppercase tracking-wider">
                            <i class="ph-fill ph-video-camera"></i> Zoom Meeting
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-red-600 transition-colors">
                            Bedah Tuntas Soal UTBK Pengetahuan Kuantitatif 2025
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            Bergabunglah sekarang untuk membahas strategi jitu menjawab soal sulit dalam waktu kurang dari 1
                            menit.
                        </p>

                        <div class="flex items-center gap-3 mb-6">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=100&auto=format&fit=crop"
                                class="w-10 h-10 rounded-full border-2 border-white shadow-sm" alt="Speaker">
                            <div>
                                <p class="text-xs text-slate-400">Speaker</p>
                                <p class="text-sm font-bold text-slate-800">Jerome P. (Matematikawan)</p>
                            </div>
                        </div>

                        <div class="mt-auto pt-6 border-t border-slate-100">
                            <a href="#"
                                class="block w-full py-3 bg-red-600 text-white text-center rounded-xl font-bold hover:bg-red-700 transition shadow-lg shadow-red-600/20">
                                Gabung Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="event-card group bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-status="upcoming">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 grayscale group-hover:grayscale-0"
                            alt="Event Thumbnail">

                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-primary-600 uppercase">
                            Webinar Gratis
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1 relative">
                        <div
                            class="absolute top-[-30px] right-6 bg-white border border-slate-100 shadow-lg rounded-2xl p-3 text-center min-w-[70px]">
                            <span class="block text-xs font-bold text-red-500 uppercase">JAN</span>
                            <span class="block text-2xl font-extrabold text-slate-900">10</span>
                        </div>

                        <div class="flex items-center gap-2 mb-3 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <i class="ph-fill ph-clock"></i> 19:00 WIB
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-primary-600 transition-colors">
                            Tips & Trik Lolos Beasiswa LPDP Luar Negeri
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            Persiapkan dirimu dari sekarang. Simak pengalaman awardee Harvard University.
                        </p>

                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                            <div class="flex -space-x-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] text-slate-600 font-bold">
                                    +120</div>
                                <span class="ml-2 text-xs text-slate-500 self-center pl-2">Pendaftar</span>
                            </div>
                            <button
                                class="px-6 py-2 border-2 border-primary-100 text-primary-600 rounded-lg font-bold hover:bg-primary-600 hover:text-white transition">
                                Daftar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="event-card group bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-status="upcoming">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Event Thumbnail">
                        <div
                            class="absolute top-4 left-4 bg-accent-500 text-white px-3 py-1 rounded-lg text-xs font-bold uppercase shadow-lg">
                            Workshop Premium
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1 relative">
                        <div
                            class="absolute top-[-30px] right-6 bg-white border border-slate-100 shadow-lg rounded-2xl p-3 text-center min-w-[70px]">
                            <span class="block text-xs font-bold text-red-500 uppercase">JAN</span>
                            <span class="block text-2xl font-extrabold text-slate-900">15</span>
                        </div>

                        <div class="flex items-center gap-2 mb-3 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <i class="ph-fill ph-map-pin"></i> Hotel Santika, SBY
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-primary-600 transition-colors">
                            Bootcamp Coding Intensif: React & Laravel 12
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            3 Hari coding bareng expert. Laptop disediakan. Makan siang & sertifikat termasuk.
                        </p>

                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                            <div>
                                <p class="text-xs text-slate-400 line-through">Rp 500.000</p>
                                <p class="text-lg font-bold text-slate-900">Rp 350rb</p>
                            </div>
                            <button
                                class="px-6 py-2 bg-primary-600 text-white rounded-lg font-bold hover:bg-primary-700 transition shadow-lg shadow-primary-600/20">
                                Beli Tiket
                            </button>
                        </div>
                    </div>
                </div>

                <div class="event-card group bg-slate-50 rounded-3xl border border-slate-200 overflow-hidden hover:shadow-md transition-all duration-300 flex flex-col opacity-80 hover:opacity-100"
                    data-status="ended">
                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute inset-0 bg-slate-900/50 flex items-center justify-center z-10">
                            <span
                                class="px-4 py-2 bg-black/50 backdrop-blur rounded-lg text-white font-bold border border-white/20">
                                BERAKHIR
                            </span>
                        </div>
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover grayscale" alt="Event Thumbnail">
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3 text-slate-400 text-xs font-bold uppercase tracking-wider">
                            <i class="ph-fill ph-calendar-x"></i> 10 Des 2024
                        </div>
                        <h3 class="text-xl font-bold text-slate-700 mb-2 leading-snug">
                            Strategi Manajemen Waktu untuk Pelajar
                        </h3>
                        <p class="text-slate-400 text-sm mb-6 line-clamp-2">
                            Event ini telah berakhir. Anda dapat melihat rangkuman materi di blog kami.
                        </p>

                        <div class="mt-auto pt-4 border-t border-slate-200">
                            <button
                                class="w-full py-2 border border-slate-300 text-slate-500 rounded-lg font-bold hover:bg-white hover:text-slate-800 transition flex items-center justify-center gap-2">
                                <i class="ph-bold ph-play-circle"></i> Tonton Rekaman
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div id="event-empty" class="hidden text-center py-20">
                <div
                    class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                    <i class="ph-fill ph-calendar-slash text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Tidak ada event ditemukan</h3>
                <p class="text-slate-500">Coba ubah filter kategori event kamu.</p>
            </div>
        </div>
    </section>

    <section class="py-20 px-4">
        <div
            class="max-w-4xl mx-auto bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl p-8 md:p-12 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary-600 opacity-20 rounded-full blur-3xl"></div>

            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 relative z-10">Jangan Sampai Ketinggalan Info!</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto relative z-10">Dapatkan notifikasi langsung ke emailmu setiap
                kali ada webinar gratis atau event seru lainnya.</p>

            <form class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto relative z-10">
                <input type="email" placeholder="Masukkan alamat email..."
                    class="w-full px-5 py-3 rounded-full bg-white/10 border border-white/10 text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500 backdrop-blur-sm">
                <button type="submit"
                    class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-full transition shadow-lg shadow-primary-600/30 whitespace-nowrap">
                    Langganan
                </button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function filterEvents(category) {
            const cards = document.querySelectorAll('.event-card');
            const btns = document.querySelectorAll('.event-filter-btn');
            const emptyState = document.getElementById('event-empty');
            let visibleCount = 0;

            // 1. Update Button State
            btns.forEach(btn => {
                // Hapus style active dari semua button
                btn.className =
                    "event-filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md border border-transparent hover:border-slate-200 transition-all whitespace-nowrap flex items-center gap-2";

                // Cek jika button ini yang diklik
                if (btn.getAttribute('onclick').includes(category)) {
                    btn.className =
                        "event-filter-btn active px-6 py-2 rounded-full text-sm font-bold transition-all bg-slate-900 text-white shadow-lg whitespace-nowrap flex items-center gap-2";
                }
            });

            // 2. Filter Cards
            cards.forEach(card => {
                card.classList.remove('hidden'); // Reset dulu

                if (category === 'all' || card.getAttribute('data-status') === category) {
                    card.style.display = 'flex';
                    // Animasi masuk
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // 3. Check Empty State
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }
    </script>
@endsection
