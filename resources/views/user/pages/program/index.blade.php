@extends('user.layouts.app')

@section('content')
    <section class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#4b5563 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-primary-900 text-primary-200 text-xs font-bold mb-4 border border-primary-700">Tahun
                Ajaran 2024/2025</span>
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Pilih Paket Belajar Terbaikmu</h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">Investasi terbaik untuk masa depan. Pilih program yang
                sesuai dengan jenjang sekolah dan target akademismu.</p>
        </div>
    </section>

    <section class="sticky top-[65px] z-40 bg-slate-50/95 backdrop-blur py-4 border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 overflow-x-auto">
            <div class="flex md:justify-center gap-2 min-w-max" id="filter-container">
                <button onclick="filterSelection('all')"
                    class="filter-btn active px-6 py-2 rounded-full text-sm font-bold transition-all bg-slate-800 text-white shadow-lg">Semua</button>
                <button onclick="filterSelection('sd')"
                    class="filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-slate-200">SD
                    Kelas 4-6</button>
                <button onclick="filterSelection('smp')"
                    class="filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-slate-200">SMP</button>
                <button onclick="filterSelection('sma')"
                    class="filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-slate-200">SMA</button>
                <button onclick="filterSelection('utbk')"
                    class="filter-btn px-6 py-2 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-slate-200">UTBK
                    & Alumni</button>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-20 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="program-grid">

                <div class="program-card bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-category="sd">
                    <div class="p-1 bg-gradient-to-r from-blue-400 to-cyan-400"></div>
                    <div class="p-8 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold uppercase tracking-wider">SD
                                4, 5, 6</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Pintar Dasar</h3>
                        <p class="text-slate-500 text-sm mb-6">Pondasi kuat untuk mata pelajaran dasar Matematika & IPA.
                        </p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>2 Sesi Live Class / Minggu</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Akses Video Animasi</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Bank Soal SD Lengkap</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 pt-0 border-t border-slate-100 mt-auto">
                        <p class="text-slate-400 text-xs line-through mb-1">Rp 250.000</p>
                        <div class="flex items-end gap-1 mb-4">
                            <span class="text-3xl font-bold text-slate-900">Rp 150rb</span>
                            <span class="text-slate-500 text-sm mb-1">/bulan</span>
                        </div>
                        <button
                            class="w-full py-3 rounded-xl border-2 border-slate-200 text-slate-700 font-bold hover:border-primary-600 hover:text-primary-600 transition">Lihat
                            Detail</button>
                    </div>
                </div>

                <div class="program-card relative bg-white rounded-3xl border-2 border-primary-500 overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-category="smp">
                    <div class="absolute top-0 right-0 bg-primary-600 text-white text-xs font-bold px-3 py-1 rounded-bl-xl">
                        POPULER</div>
                    <div class="p-1 bg-gradient-to-r from-primary-600 to-indigo-600"></div>
                    <div class="p-8 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold uppercase tracking-wider">SMP
                                7, 8, 9</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">SMP Juara</h3>
                        <p class="text-slate-500 text-sm mb-6">Persiapan ulangan harian dan Asesmen Nasional dengan
                            materi padat.</p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-primary-600 text-lg"></i>
                                <span>3 Sesi Live Class / Minggu</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-primary-600 text-lg"></i>
                                <span>Konsultasi PR via WhatsApp</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-primary-600 text-lg"></i>
                                <span>Tryout Bulanan</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-primary-600 text-lg"></i>
                                <span>Laporan Belajar ke Ortu</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 pt-0 border-t border-slate-100 mt-auto">
                        <div class="flex items-end gap-1 mb-4">
                            <span class="text-3xl font-bold text-primary-600">Rp 350rb</span>
                            <span class="text-slate-500 text-sm mb-1">/bulan</span>
                        </div>
                        <button
                            class="w-full py-3 rounded-xl bg-primary-600 text-white font-bold hover:bg-primary-700 shadow-lg shadow-primary-600/20 transition">Pilih
                            Paket Ini</button>
                    </div>
                </div>

                <div class="program-card bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-category="sma">
                    <div class="p-1 bg-gradient-to-r from-orange-400 to-red-400"></div>
                    <div class="p-8 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="px-3 py-1 bg-orange-50 text-orange-600 rounded-lg text-xs font-bold uppercase tracking-wider">SMA
                                IPA/IPS</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">SMA Fokus</h3>
                        <p class="text-slate-500 text-sm mb-6">Pemahaman konsep mendalam untuk mengejar nilai rapor
                            tinggi.</p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>3 Sesi Live Class / Minggu</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Akses Semua Mapel</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Konseling Jurusan Awal</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 pt-0 border-t border-slate-100 mt-auto">
                        <div class="flex items-end gap-1 mb-4">
                            <span class="text-3xl font-bold text-slate-900">Rp 450rb</span>
                            <span class="text-slate-500 text-sm mb-1">/bulan</span>
                        </div>
                        <button
                            class="w-full py-3 rounded-xl border-2 border-slate-200 text-slate-700 font-bold hover:border-primary-600 hover:text-primary-600 transition">Lihat
                            Detail</button>
                    </div>
                </div>

                <div class="program-card bg-slate-900 rounded-3xl border border-slate-700 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col text-white"
                    data-category="utbk">
                    <div class="p-1 bg-gradient-to-r from-purple-500 to-pink-500"></div>
                    <div class="p-8 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="px-3 py-1 bg-slate-700 text-purple-300 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-600">PEJUANG
                                PTN</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">UTBK Ultimate</h3>
                        <p class="text-slate-400 text-sm mb-6">Program "keras" untuk kamu yang ambisius masuk Top 3
                            PTN.</p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-slate-300 text-sm">
                                <i class="ph-fill ph-star text-yellow-400 text-lg"></i>
                                <span>Drilling Soal Skolastik Tiap Hari</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-300 text-sm">
                                <i class="ph-fill ph-star text-yellow-400 text-lg"></i>
                                <span>Tryout IRT System (Mirip Asli)</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-300 text-sm">
                                <i class="ph-fill ph-star text-yellow-400 text-lg"></i>
                                <span>Akses 24 Jam LMS</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-300 text-sm">
                                <i class="ph-fill ph-star text-yellow-400 text-lg"></i>
                                <span>Garansi Uang Kembali*</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 pt-0 border-t border-slate-700 mt-auto">
                        <div class="flex items-end gap-1 mb-4">
                            <span class="text-3xl font-bold text-white">Rp 999rb</span>
                            <span class="text-slate-400 text-sm mb-1">/bulan</span>
                        </div>
                        <button
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold hover:opacity-90 transition">Gabung
                            Sekarang</button>
                    </div>
                </div>
                <div class="program-card bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                    data-category="sma">
                    <div class="p-1 bg-slate-200"></div>
                    <div class="p-8 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase tracking-wider">PRIVATE</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">SMA Privat 1-on-1</h3>
                        <p class="text-slate-500 text-sm mb-6">Belajar eksklusif dengan guru favorit pilihanmu. Jadwal
                            kamu yang atur.</p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>1 Guru 1 Siswa</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Bisa Request Materi Spesifik</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-700 text-sm">
                                <i class="ph-fill ph-check-circle text-green-500 text-lg"></i>
                                <span>Online / Offline (Datang ke Rumah)</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 pt-0 border-t border-slate-100 mt-auto">
                        <div class="flex items-end gap-1 mb-4">
                            <span class="text-3xl font-bold text-slate-900">Rp 150rb</span>
                            <span class="text-slate-500 text-sm mb-1">/sesi</span>
                        </div>
                        <button
                            class="w-full py-3 rounded-xl border-2 border-slate-200 text-slate-700 font-bold hover:border-primary-600 hover:text-primary-600 transition">Konsultasi
                            Dulu</button>
                    </div>
                </div>

            </div>

            <div id="empty-state" class="hidden text-center py-20">
                <div
                    class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <i class="ph-fill ph-magnifying-glass text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Belum ada paket untuk kategori ini</h3>
                <p class="text-slate-500">Coba pilih kategori lain atau hubungi admin.</p>
            </div>
        </div>
    </section>

    <section class="py-10 px-4">
        <div
            class="max-w-4xl mx-auto bg-gradient-to-r from-accent-500 to-orange-500 rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white opacity-10" style="background-image: url('data:image/svg+xml,...');">
            </div>
            <div class="text-left relative z-10">
                <h3 class="text-2xl font-bold text-white mb-2">Bingung Pilih Paket yang Mana?</h3>
                <p class="text-orange-100">Konsultasikan kebutuhan belajarmu dengan Education Consultant kami. Gratis!
                </p>
            </div>
            <a href="#"
                class="relative z-10 bg-white text-orange-600 px-8 py-3 rounded-full font-bold hover:bg-orange-50 transition shadow-lg flex items-center gap-2">
                <i class="ph-bold ph-whatsapp-logo text-xl"></i>
                Chat Konsultan
            </a>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Filter Function Logic
        function filterSelection(category) {
            const cards = document.getElementsByClassName("program-card");
            const btns = document.getElementsByClassName("filter-btn");
            const emptyState = document.getElementById("empty-state");
            let visibleCount = 0;

            // 1. Update Button Styles
            // Reset semua tombol ke style "inactive"
            for (let i = 0; i < btns.length; i++) {
                btns[i].className = btns[i].className.replace(" active bg-slate-800 text-white shadow-lg",
                    " text-slate-600 hover:bg-white hover:shadow-md border-transparent hover:border-slate-200");

                // Tambahkan style active ke tombol yang diklik
                if (btns[i].getAttribute("onclick").includes(category)) {
                    btns[i].className =
                        "filter-btn active px-6 py-2 rounded-full text-sm font-bold transition-all bg-slate-800 text-white shadow-lg";
                }
            }

            // 2. Show/Hide Cards with Animation
            for (let i = 0; i < cards.length; i++) {
                // Hapus class hidden dulu untuk animasi
                cards[i].classList.remove("hidden");

                if (category === "all" || cards[i].getAttribute("data-category") === category) {
                    cards[i].style.display = "flex";
                    // Sedikit delay untuk efek fade in (optional)
                    setTimeout(() => {
                        cards[i].style.opacity = "1";
                        cards[i].style.transform = "scale(1)";
                    }, 50);
                    visibleCount++;
                } else {
                    cards[i].style.display = "none";
                    cards[i].style.opacity = "0";
                    cards[i].style.transform = "scale(0.95)";
                }
            }

            // 3. Show Empty State if no cards match
            if (visibleCount === 0) {
                emptyState.classList.remove("hidden");
            } else {
                emptyState.classList.add("hidden");
            }
        }
    </script>
@endsection
