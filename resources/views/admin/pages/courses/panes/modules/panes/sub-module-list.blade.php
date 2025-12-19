<div x-show="activeTab === 'materi'" x-cloak x-data="subModuleCrud()"
    @open-create-submodule-modal.window="openCreateModal()" class="divide-y divide-slate-100">

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
                    <form method="POST" action="{{ route('sub-modules.move-up', $subModule->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition"
                            title="Move Up">
                            <i class="ti ti-arrow-up text-lg"></i>
                        </button>
                    </form>

                    {{-- Move Down --}}
                    <form method="POST" action="{{ route('sub-modules.move-down', $subModule->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition"
                            title="Move Down">
                            <i class="ti ti-arrow-down text-lg"></i>
                        </button>
                    </form>

                    {{-- Show --}}
                    <a href="{{ route('sub-modules.show', $subModule->id) }}"
                        class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition"
                        title="Lihat">
                        <i class="ti ti-eye text-lg"></i>
                    </a>

                    {{-- Edit --}}
                    <button @click="openEditModal(@js($subModule))"
                        class="p-2 text-amber-500 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition"
                        title="Edit">
                        <i class="ti ti-edit text-lg"></i>
                    </button>

                    {{-- Delete --}}
                    <form action="{{ route('sub-modules.destroy', $subModule->id) }}" method="POST"
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
            <button @click="openCreateModal()"
                class="px-4 py-2 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] transition text-sm font-medium">
                + Tambah Materi
            </button>
        </div>
    @endif

    {{-- Modal Create/Edit SubModule --}}
    <div x-show="isModalOpen" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-1000"
        style="display: none;">
        <div @click.away="closeModal()" class="bg-white rounded-2xl w-full max-w-3xl p-6 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-slate-800" x-text="modalTitle"></h3>
                <button @click="closeModal()" class="text-slate-400 hover:text-slate-600">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>

            <form :action="formAction" method="POST" class="space-y-4" @submit="syncContent()">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                    <input type="text" name="title" x-model="form.title"
                        class="w-full border border-slate-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Sub Title</label>
                    <input type="text" name="sub_title" x-model="form.sub_title"
                        class="w-full border border-slate-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Content</label>
                    <textarea id="summernote-editor" name="content" class="w-full"></textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" @click="closeModal()"
                        class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] transition font-medium">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.pages.courses.panes.modules.scripts.sub-module-scripts')
