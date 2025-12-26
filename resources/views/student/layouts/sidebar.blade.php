<div class="lg:col-span-3">
    <div class="sticky top-28 space-y-6">

        {{-- Profile --}}
        <div
            class="bg-white rounded-2xl border border-slate-200 p-6 text-center shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-br from-primary-600 to-indigo-600">
            </div>

            <div class="relative w-24 h-24 mx-auto mt-8 mb-4">
                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=200&auto=format&fit=crop"
                    class="w-full h-full rounded-full object-cover border-4 border-white shadow-md" alt="Profile">
                <button
                    class="absolute bottom-0 right-0 bg-white text-slate-600 p-1.5 rounded-full border border-slate-200 hover:text-primary-600 transition shadow-sm"
                    title="Ganti Foto">
                    <i class="ph-bold ph-camera"></i>
                </button>
            </div>

            <h2 class="text-lg font-bold text-slate-900">Aditya Pratama</h2>
            <p class="text-sm text-slate-500 mb-4">Siswa Paket UTBK</p>

            <div class="flex justify-center gap-2 mb-6">
                <span
                    class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full border border-yellow-200 flex items-center gap-1">
                    <i class="ph-fill ph-crown"></i> Premium
                </span>
            </div>

            <div class="grid grid-cols-2 gap-2 border-t border-slate-100 pt-4">
                <div class="text-center">
                    <span class="block text-lg font-bold text-slate-900">12</span>
                    <span class="text-xs text-slate-500">Kursus</span>
                </div>
                <div class="text-center border-l border-slate-100">
                    <span class="block text-lg font-bold text-slate-900">850</span>
                    <span class="text-xs text-slate-500">XP Poin</span>
                </div>
            </div>
        </div>

        {{-- Sidebar Menu --}}
        <nav class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden hidden lg:block">
            <div class="p-2 space-y-1">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-primary-50 text-primary-700 rounded-xl font-bold transition">
                    <i class="ph-fill ph-squares-four text-lg"></i> Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary-600 rounded-xl font-medium transition">
                    <i class="ph-bold ph-book-open text-lg"></i> Kursus Saya
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary-600 rounded-xl font-medium transition">
                    <i class="ph-bold ph-clipboard-text text-lg"></i> Tugas & Ujian
                    <span
                        class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">2</span>
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary-600 rounded-xl font-medium transition">
                    <i class="ph-bold ph-receipt text-lg"></i> Riwayat Pembelian
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary-600 rounded-xl font-medium transition">
                    <i class="ph-bold ph-gear text-lg"></i> Edit Profil
                </a>
                <div class="border-t border-slate-100 my-2"></div>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl font-medium transition">
                    <i class="ph-bold ph-sign-out text-lg"></i> Keluar
                </a>
            </div>
        </nav>

        {{-- Mobile Menu --}}
        <div class="lg:hidden">
            <select
                class="w-full p-3 border border-slate-200 rounded-xl bg-white font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary-500"
                onchange="window.location.href=this.value">
                <option value="#" selected>🏠 Dashboard Overview</option>
                <option value="#">📚 Kursus Saya</option>
                <option value="#">📝 Tugas & Ujian</option>
                <option value="#">💳 Riwayat Pembelian</option>
                <option value="#">⚙️ Edit Profil</option>
            </select>
        </div>
    </div>
</div>
