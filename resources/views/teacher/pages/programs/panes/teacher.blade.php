<div id="teachers" class="tab-content hidden">
    <div class="flex justify-between items-center mb-6">
        <div class="relative w-full sm:w-72">
            <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" placeholder="Cari nama atau email guru..."
                class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 text-sm">
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        @for ($i = 0; $i < 4; $i++)
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 group p-6 flex flex-col items-center text-center relative">

                <div class="w-24 h-24 rounded-full p-1 border border-slate-100 bg-slate-50 mb-4">
                    <img src="https://i.pravatar.cc/150?u=a042581f4e29026024d{{ $i }}" alt="Teacher"
                        class="w-full h-full rounded-full object-cover">
                </div>

                <div class="w-full">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Budi Santoso, M.Pd</h3>
                    <p class="text-sm text-slate-500 mb-4 font-medium">Spesialis Matematika</p>

                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-slate-50 text-slate-600 text-xs font-semibold rounded-full border border-slate-200">Kuantitatif</span>
                        <span
                            class="px-3 py-1 bg-slate-50 text-slate-600 text-xs font-semibold rounded-full border border-slate-200">Penalaran</span>
                    </div>

                    <div class="flex justify-center items-center gap-4">
                        <button
                            class="py-2.5 px-6 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:border-primary-600 hover:text-primary-600 hover:bg-primary-50 transition text-sm shadow-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
