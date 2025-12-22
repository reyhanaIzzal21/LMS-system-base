@extends('user.layouts.app')

@section('name')
    Daftar Kelas & Materi - EduSmart
@endsection

@section('content')
    <section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(#60a5fa 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-600 blur-[120px] opacity-20 rounded-full"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-6">Eksplorasi Kelas Favoritmu</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto mb-10">Tingkatkan skill akademik dan soft skill dengan materi
                yang disusun oleh praktisi dan guru terbaik.</p>

            <div class="bg-white p-2 rounded-full max-w-2xl mx-auto shadow-2xl flex flex-col md:flex-row items-center gap-2">
                <div class="flex-1 w-full flex items-center px-4 md:border-r border-slate-100">
                    <i class="ph ph-magnifying-glass text-slate-400 text-xl"></i>
                    <input type="text" placeholder="Cari materi (mis: Matematika Diskrit)"
                        class="w-full py-3 px-3 outline-none text-slate-700 bg-transparent placeholder:text-slate-400">
                </div>
                <div class="w-full md:w-auto px-2">
                    <button
                        class="w-full md:w-auto px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-full transition shadow-lg shadow-primary-600/20">
                        Cari
                    </button>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <span class="text-slate-400 text-sm py-1">Populer:</span>
                <button
                    class="px-3 py-1 bg-slate-800 hover:bg-primary-900 text-slate-300 text-sm rounded-full transition border border-slate-700">UTBK
                    SNBT</button>
                <button
                    class="px-3 py-1 bg-slate-800 hover:bg-primary-900 text-slate-300 text-sm rounded-full transition border border-slate-700">Matematika
                    SMA</button>
                <button
                    class="px-3 py-1 bg-slate-800 hover:bg-primary-900 text-slate-300 text-sm rounded-full transition border border-slate-700">Bahasa
                    Inggris</button>
                <button
                    class="px-3 py-1 bg-slate-800 hover:bg-primary-900 text-slate-300 text-sm rounded-full transition border border-slate-700">Coding
                    Dasar</button>
            </div>
        </div>
    </section>

    <section class="border-b border-slate-200 bg-white sticky top-[72px] z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <p class="text-slate-500 text-sm font-medium"><span class="text-slate-900 font-bold">124</span> Course tersedia
            </p>

            <div class="flex items-center gap-3">
                <button
                    class="md:hidden flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-lg text-sm font-bold text-slate-700">
                    <i class="ph ph-faders"></i> Filter
                </button>

                <div class="hidden md:flex items-center gap-2">
                    <span class="text-sm text-slate-500">Urutkan:</span>
                    <select
                        class="form-select bg-slate-50 border-none text-sm font-bold text-slate-700 focus:ring-0 cursor-pointer py-2 pr-8 rounded-lg hover:bg-slate-100 transition">
                        <option>Terpopuler</option>
                        <option>Terbaru</option>
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="{{ route('courses.detail') }}"
                    class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?q=80&w=2070&auto=format&fit=crop"
                            alt="Thumbnail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        <div class="absolute top-3 left-3 flex gap-2">
                            <span
                                class="bg-white/90 backdrop-blur text-primary-600 text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider">
                                Matematika
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-1">
                        <div class="mb-3">
                            <div class="flex items-center gap-1 mb-1 text-accent-500 text-xs font-bold">
                                <i class="ph-fill ph-star"></i>
                                <span>4.8</span>
                                <span class="text-slate-400 font-normal">(120 Review)</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-slate-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition-colors">
                                Master Aljabar Linear untuk Persiapan Olimpiade
                            </h3>
                        </div>

                        <div class="flex items-center gap-2 mb-4 mt-auto pt-4 border-t border-slate-50">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop"
                                class="w-8 h-8 rounded-full object-cover border border-slate-200" alt="Avatar">
                            <div>
                                <p class="text-xs text-slate-500">Pemateri</p>
                                <p class="text-xs font-bold text-slate-800">Dr. Budi Santoso</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-400 line-through">Rp 250.000</span>
                                <span class="text-lg font-bold text-primary-600">Rp 199.000</span>
                            </div>
                            <button
                                class="w-10 h-10 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition">
                                <i class="ph-bold ph-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </a>

                <div
                    class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=2071&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-white/90 backdrop-blur text-purple-600 text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider">
                                Fisika
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-1">
                        <div class="mb-3">
                            <div class="flex items-center gap-1 mb-1 text-accent-500 text-xs font-bold">
                                <i class="ph-fill ph-star"></i>
                                <span>5.0</span>
                                <span class="text-slate-400 font-normal">(45 Review)</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-slate-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition-colors">
                                Konsep Dasar Fisika Kuantum Mudah Dipahami
                            </h3>
                        </div>

                        <div class="flex items-center gap-2 mb-4 mt-auto pt-4 border-t border-slate-50">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1888&auto=format&fit=crop"
                                class="w-8 h-8 rounded-full object-cover border border-slate-200" alt="Avatar">
                            <div>
                                <p class="text-xs text-slate-500">Pemateri</p>
                                <p class="text-xs font-bold text-slate-800">Sarah Wijaya, M.Sc</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-lg font-bold text-slate-900">Rp 150.000</span>
                            </div>
                            <button
                                class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition">
                                <i class="ph-bold ph-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=2031&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-white/90 backdrop-blur text-green-600 text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider">
                                Programming
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-1">
                        <div class="mb-3">
                            <div class="flex items-center gap-1 mb-1 text-accent-500 text-xs font-bold">
                                <i class="ph-fill ph-star"></i>
                                <span>4.5</span>
                                <span class="text-slate-400 font-normal">(800+ Students)</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-slate-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition-colors">
                                Intro to Laravel 12: From Zero to Hero
                            </h3>
                        </div>

                        <div class="flex items-center gap-2 mb-4 mt-auto pt-4 border-t border-slate-50">
                            <div
                                class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-xs border border-primary-200">
                                ES</div>
                            <div>
                                <p class="text-xs text-slate-500">Pemateri</p>
                                <p class="text-xs font-bold text-slate-800">EduSmart Team</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-lg font-bold text-green-600">GRATIS</span>
                            </div>
                            <button
                                class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition">
                                <i class="ph-bold ph-play"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-16 flex justify-center">
                <nav class="flex gap-2">
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-white hover:text-primary-600 hover:shadow transition"><i
                            class="ph-bold ph-caret-left"></i></a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary-600 text-white font-bold shadow-lg shadow-primary-600/30">1</a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 font-bold hover:bg-white hover:text-primary-600 hover:shadow transition">2</a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 font-bold hover:bg-white hover:text-primary-600 hover:shadow transition">3</a>
                    <span class="w-10 h-10 flex items-center justify-center text-slate-400">...</span>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-white hover:text-primary-600 hover:shadow transition"><i
                            class="ph-bold ph-caret-right"></i></a>
                </nav>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Opsional: Animasi simple saat page load
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.group');
            cards.forEach((card, index) => {
                card.style.opacity = 0;
                card.style.transform = "translateY(20px)";
                setTimeout(() => {
                    card.style.transition = "all 0.5s ease-out";
                    card.style.opacity = 1;
                    card.style.transform = "translateY(0)";
                }, index * 100); // Stagger effect
            });
        });
    </script>
@endsection
