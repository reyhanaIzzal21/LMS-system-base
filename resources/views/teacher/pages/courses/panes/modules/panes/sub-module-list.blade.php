<div x-show="activeTab === 'materi'" x-cloak class="divide-y divide-slate-100">

    @if (session('success'))
        <div class="m-4 p-3 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
    @endif

    @if ($module->subModules->count())
        @foreach ($module->subModules as $subModule)
            <div class="p-5 flex items-center justify-between hover:bg-slate-50 transition group">
                <div class="flex items-center gap-4">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#5d87ff] font-bold text-sm">
                        {{ $subModule->step }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 group-hover:text-[#5d87ff] transition">
                            {{ $subModule->title }}</h4>
                        <p class="text-xs text-slate-500">{{ $subModule->sub_title }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    {{-- Move Up --}}
                    <form method="POST" action="{{ route('teacher.sub-modules.move-up', $subModule->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition"
                            title="Move Up">
                            <i class="ti ti-arrow-up text-lg"></i>
                        </button>
                    </form>

                    {{-- Move Down --}}
                    <form method="POST" action="{{ route('teacher.sub-modules.move-down', $subModule->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition"
                            title="Move Down">
                            <i class="ti ti-arrow-down text-lg"></i>
                        </button>
                    </form>

                    {{-- Show --}}
                    <a href="{{ route('teacher.sub-modules.show', $subModule->id) }}"
                        class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition"
                        title="Lihat">
                        <i class="ti ti-eye text-lg"></i>
                    </a>

                    {{-- Edit - Link to Edit Page --}}
                    <a href="{{ route('teacher.sub-modules.edit', $subModule->id) }}"
                        class="p-2 text-amber-500 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition"
                        title="Edit">
                        <i class="ti ti-edit text-lg"></i>
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('teacher.sub-modules.destroy', $subModule->id) }}" method="POST"
                        onsubmit="return confirm('Hapus materi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition"
                            title="Hapus">
                            <i class="ti ti-trash text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="p-12 text-center">
            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ti ti-file-text text-3xl text-slate-400"></i>
            </div>
            <h4 class="text-lg font-semibold text-slate-700 mb-1">Belum ada materi</h4>
            <p class="text-slate-500 text-sm mb-4">Tambahkan materi pertama untuk modul ini.</p>
            <a href="{{ route('teacher.sub-modules.create', $module->id) }}"
                class="inline-block px-4 py-2 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] transition text-sm font-medium">
                + Tambah Materi
            </a>
        </div>
    @endif
</div>
