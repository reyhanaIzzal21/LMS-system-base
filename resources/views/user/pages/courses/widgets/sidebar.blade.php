<aside id="course-sidebar"
    class="fixed inset-y-0 left-0 z-40 w-80 bg-white border-r border-slate-200 flex flex-col h-full transform -translate-x-full lg:translate-x-0 lg:static lg:w-96 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">

    <div class="lg:hidden p-4 flex justify-end border-b border-slate-100">
        <button onclick="toggleSidebar()" class="p-2 text-slate-500 hover:text-red-500">
            <i class="ph-bold ph-x text-xl"></i>
        </button>
    </div>

    <div class="p-5 border-b border-slate-100 bg-white">
        <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-2">Progress Belajar</h2>
        <div class="w-full bg-slate-100 rounded-full h-2.5 mb-2">
            <div class="bg-green-500 h-2.5 rounded-full" style="width: 25%"></div>
        </div>
        <div class="flex justify-between text-xs font-bold">
            <span class="text-slate-900">25% Selesai</span>
            <span class="text-slate-400">2/8 Item</span>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto custom-scrollbar p-2 space-y-2">

        <div class="module-item bg-slate-50 rounded-xl border border-slate-200 overflow-hidden">
            <button
                class="w-full flex items-center justify-between p-4 bg-slate-100 text-left hover:bg-slate-200 transition focus:outline-none"
                onclick="toggleModule(this)">
                <span class="font-bold text-slate-900 text-sm">Modul 1: Introduction</span>
                <i
                    class="ph-bold ph-caret-down text-slate-500 transform transition-transform duration-300 rotate-180"></i>
            </button>

            <div class="module-content divide-y divide-slate-200/50">
                {{-- ketika user sudah mark materi ini selesai --}}
                <a href="#" class="flex items-start gap-3 p-3 hover:bg-white transition opacity-60">
                    <div class="mt-0.5 text-green-600">
                        <i class="ph-fill ph-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-700 line-through decoration-slate-400">Welcome &
                            Setup</p>
                        <div class="flex items-center gap-1 text-[10px] text-slate-400 mt-1">
                            <i class="ph-fill ph-play-circle"></i> Video • 5m
                        </div>
                    </div>
                </a>

                {{-- ketika user sedang mengikuti materi ini --}}
                <a href="#"
                    class="flex items-start gap-3 p-3 bg-blue-50 border-l-4 border-primary-600 transition">
                    <div class="mt-0.5 text-primary-600">
                        <i class="ph-fill ph-play-circle text-lg animate-pulse"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary-700">Instalasi Laravel 12 & Tools</p>
                        <div class="flex items-center gap-1 text-[10px] text-primary-500 mt-1">
                            <i class="ph-fill ph-play-circle"></i> Video & Text • 15m
                        </div>
                    </div>
                </a>

                {{-- ketika user belum mark materi ini selesai --}}
                <a href="#" class="flex items-start gap-3 p-3 hover:bg-white transition group">
                    <div class="mt-0.5 text-slate-300 group-hover:text-purple-500">
                        <i class="ph-fill ph-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600 group-hover:text-slate-900">Tugas 1: Setup
                            Environment</p>
                        <div class="flex items-center gap-1 text-[10px] text-slate-400 mt-1">
                            <i class="ph-fill ph-file-text"></i> Assignment
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="module-item bg-white rounded-xl border border-slate-200 overflow-hidden">
            <button
                class="w-full flex items-center justify-between p-4 bg-white text-left hover:bg-slate-50 transition focus:outline-none"
                onclick="toggleModule(this)">
                <span class="font-bold text-slate-900 text-sm">Modul 2: Database Design</span>
                <i class="ph-bold ph-caret-down text-slate-500 transform transition-transform duration-300"></i>
            </button>

            <div class="module-content divide-y divide-slate-100 hidden">
                {{-- ketika user belum mark materi ini selesai --}}
                <a href="#" class="flex items-start gap-3 p-3 hover:bg-slate-50 transition group">
                    <div class="mt-0.5 text-slate-300">
                        <i class="ph-fill ph-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600">Intro to Migration</p>
                        <div class="flex items-center gap-1 text-[10px] text-slate-400 mt-1">
                            <i class="ph-fill ph-play-circle"></i> Video • 10m
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</aside>
