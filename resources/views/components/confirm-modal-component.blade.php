<!-- Overlay -->
<div id="modal-confirm" class="fixed inset-0 z-1000 hidden items-center justify-center bg-slate-900/50 backdrop-blur-sm">
    <!-- Modal Box -->
    <div class="w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-2xl">
        <!-- Icon -->
        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
            <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <!-- Title -->
        <h3 id="confirmModalTitle" class="mb-2 text-lg font-bold text-slate-800">
            Konfirmasi
        </h3>

        <!-- Description -->
        <p id="confirmModalText" class="mb-6 text-sm text-slate-500">
            Apakah anda yakin?
        </p>

        <!-- Actions -->
        <div class="flex justify-center gap-3">
            <button type="button" onclick="closeConfirmModal()"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2 font-medium text-slate-700 transition hover:bg-slate-50">
                Batal
            </button>

            <form id="confirmForm" method="POST" class="w-full">
                @csrf
                @method('PATCH')
                <!-- Both fields for compatibility -->
                <input type="hidden" name="is_ready" id="confirmIsReady">
                <input type="hidden" name="is_active" id="confirmIsActive">

                <button type="submit" id="confirmButton"
                    class="w-full rounded-lg bg-blue-600 px-4 py-2 font-medium text-white shadow-md shadow-blue-500/20 transition hover:bg-blue-700">
                    Ya, Lanjutkan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openConfirmModal(actionUrl, title, description, statusValue, buttonText = 'Ya, Lanjutkan',
        buttonColorClass = 'bg-blue-600 hover:bg-blue-700 shadow-blue-500/20') {
        const modal = document.getElementById('modal-confirm');
        const form = document.getElementById('confirmForm');
        const titleEl = document.getElementById('confirmModalTitle');
        const text = document.getElementById('confirmModalText');
        const isReadyInput = document.getElementById('confirmIsReady');
        const isActiveInput = document.getElementById('confirmIsActive');
        const confirmBtn = document.getElementById('confirmButton');

        form.action = actionUrl;
        titleEl.innerHTML = title;
        text.innerHTML = description;

        // Set both values for compatibility with courses (is_ready) and programs (is_active)
        isReadyInput.value = statusValue;
        isActiveInput.value = statusValue;

        confirmBtn.innerHTML = buttonText;

        // Reset classes
        confirmBtn.className =
            `w-full rounded-lg px-4 py-2 font-medium text-white shadow-md transition ${buttonColorClass}`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeConfirmModal() {
        const modal = document.getElementById('modal-confirm');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
