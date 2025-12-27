<div id="teachers" class="tab-content hidden">
    <div class="flex justify-between items-center mb-6">
        <div class="relative w-full sm:w-72">
            <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" id="teacher-search" placeholder="Cari nama atau email guru..."
                class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 text-sm">
        </div>
    </div>

    @if ($program->teachers->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6" id="teachers-grid">
            @foreach ($program->teachers as $teacher)
                <div class="teacher-card bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 group p-6 flex flex-col items-center text-center relative"
                    data-name="{{ strtolower($teacher->name) }}" data-email="{{ strtolower($teacher->email) }}">

                    <div class="w-24 h-24 rounded-full p-1 border border-slate-100 bg-slate-50 mb-4">
                        @if ($teacher->avatar)
                            <img src="{{ asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}"
                                class="w-full h-full rounded-full object-cover">
                        @else
                            <div class="w-full h-full rounded-full bg-primary-100 flex items-center justify-center">
                                <span class="text-2xl font-bold text-primary-600">{{ $teacher->initials() }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="w-full">
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $teacher->name }}</h3>
                        <p class="text-sm text-slate-500 mb-4 font-medium">{{ $teacher->email }}</p>

                        <div class="flex justify-center items-center gap-4">
                            <button type="button"
                                class="py-2.5 px-6 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:border-primary-600 hover:text-primary-600 hover:bg-primary-50 transition text-sm shadow-sm">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-12 text-center">
            <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4">
                <i class="ti ti-users-group text-4xl text-slate-400"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700 mb-2">Belum Ada Guru</h3>
            <p class="text-slate-500">Belum ada guru yang ditambahkan ke program ini.</p>
        </div>
    @endif
</div>
