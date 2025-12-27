{{-- Add Teacher Modal --}}
<div id="modal-add-teacher"
    class="fixed inset-0 z-[1000] hidden items-center justify-center bg-slate-900/50 backdrop-blur-sm">
    <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl mx-4">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Tambah Guru</h3>
                <p class="text-sm text-slate-500">Pilih guru yang akan ditambahkan ke program ini</p>
            </div>
            <button type="button" onclick="closeAddTeacherModal()"
                class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition">
                <i class="ti ti-x text-slate-600"></i>
            </button>
        </div>

        {{-- Form --}}
        <form id="add-teacher-form" method="POST" action="{{ route('program-teachers.store', $program->id) }}">
            @csrf
            <div class="mb-6">
                <label for="teacher_ids" class="block text-sm font-medium text-slate-700 mb-2">
                    Pilih Guru <span class="text-red-500">*</span>
                </label>
                <select name="teacher_ids[]" id="teacher-select" multiple="multiple" class="w-full"
                    style="width: 100%;">
                </select>
                <p class="mt-2 text-xs text-slate-500">
                    <i class="ti ti-info-circle"></i> Anda dapat memilih beberapa guru sekaligus
                </p>
            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeAddTeacherModal()"
                    class="px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-medium hover:bg-slate-50 transition">
                    Batal
                </button>
                <button type="submit" id="btn-submit-teachers"
                    class="px-4 py-2.5 rounded-lg bg-primary-600 text-white font-medium shadow-md shadow-primary-500/20 hover:bg-primary-700 transition flex items-center gap-2">
                    <i class="ti ti-check"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
