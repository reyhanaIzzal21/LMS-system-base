<div x-show="activeTab === 'modul'" x-cloak x-data="moduleCrud()" @open-create-module-modal.window="openCreateModal()"
    class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">


    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-xl font-bold text-slate-800">Course Modules</h3>
            <p class="text-slate-500 text-sm">Manage modules for this course</p>
        </div>
    </div>


    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif


    @if ($modules->count())
        <div class="space-y-4">
            @foreach ($modules as $module)
                <div class="border border-slate-200 rounded-xl p-4 flex justify-between items-start">
                    <div>
                        <p class="text-sm text-slate-400">Step {{ $module->step }}</p>
                        <h4 class="font-semibold text-slate-800">{{ $module->title }}</h4>
                        <p class="text-slate-500 text-sm">{{ $module->sub_title }}</p>
                    </div>
                    <div class="flex gap-3">
                        <form method="POST" action="{{ route('teacher.modules.move-up', $module->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"><i class="ti ti-arrow-up"></i></button>
                        </form>

                        <form method="POST" action="{{ route('teacher.modules.move-down', $module->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"><i class="ti ti-arrow-down"></i></button>
                        </form>
                        {{-- show module --}}
                        <a href="{{ route('teacher.modules.show', $module->id) }}"
                            class="text-blue-600 text-sm">Show</a>
                        <button @click="openEditModal(@js($module))"
                            class="text-blue-600 text-sm">Edit</button>
                        <form action="{{ route('teacher.modules.destroy', $module->id) }}" method="POST"
                            onsubmit="return confirm('Delete this module?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20">
            <p class="text-slate-500">No modules added yet.</p>
        </div>
    @endif

    <!-- MODAL -->
    <div x-show="isModalOpen" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-1000">
        <div @click.away="closeModal" class="bg-white rounded-2xl w-full max-w-lg p-6">
            <h3 class="text-lg font-bold mb-4" x-text="modalTitle"></h3>


            <form :action="formAction" method="POST" class="space-y-4">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>


                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" name="title" x-model="form.title"
                        class="w-full border border-slate-300 rounded-lg p-2" required>
                </div>


                <div>
                    <label class="text-sm font-medium">Sub Title</label>
                    <textarea name="sub_title" x-model="form.sub_title" rows="3" class="w-full border border-slate-300 rounded-lg p-2"
                        required></textarea>
                </div>


                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" @click="closeModal" class="px-4 py-2 border rounded-lg">Cancel</button>
                    <button type="submit" class="bg-[#5d87ff] text-white px-4 py-2 rounded-lg">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('teacher.pages.courses.panes.modules.scripts.list-module')
