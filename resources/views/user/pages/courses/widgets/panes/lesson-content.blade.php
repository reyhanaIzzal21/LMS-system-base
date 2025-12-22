<div class="flex-1 overflow-y-auto p-4 md:p-8 lg:px-12 pb-24" id="lesson-content">
    <div class="max-w-4xl mx-auto">

        {{-- breadcrumb --}}
        <div class="flex items-center gap-2 text-xs text-slate-400 mb-4">
            <span>Modul 1</span>
            <i class="ph-bold ph-caret-right"></i>
            <span class="text-primary-600 font-bold">Sub-module 2</span>
        </div>

        {{-- lesson title --}}
        <div
            class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-8 border-b border-slate-100 pb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Instalasi Laravel 12 &
                    Konfigurasi Tools</h1>
                <p class="text-slate-500 text-sm">Diposting pada 20 Des 2024 • Oleh Dr. Budi Santoso</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="p-2 rounded-full border border-slate-200 text-slate-400 hover:text-blue-500 hover:border-blue-200 hover:bg-blue-50 transition"
                    title="Diskusi / Komentar">
                    <i class="ph-bold ph-chat-text"></i>
                </button>
            </div>
        </div>

        {{-- lesson video kalau ada dari WYSIWYG-nya --}}
        <div class="relative w-full aspect-video bg-black rounded-2xl overflow-hidden shadow-2xl mb-8 group">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-60" alt="Video Placeholder">

            <button
                class="absolute inset-0 flex items-center justify-center group-hover:scale-110 transition duration-300">
                <div
                    class="w-20 h-20 bg-primary-600/90 backdrop-blur rounded-full flex items-center justify-center pl-2 shadow-xl hover:bg-primary-500 text-white">
                    <i class="ph-fill ph-play text-4xl"></i>
                </div>
            </button>

            <div class="absolute bottom-0 left-0 w-full h-1 bg-white/20">
                <div class="h-full bg-red-600 w-1/3"></div>
            </div>
        </div>

        <div class="space-y-6 text-slate-700 leading-relaxed text-lg">
            <p>
                Halo semuanya! Di video di atas, kita sudah membahas cara menginstall Laravel via Composer.
                Sekarang, mari kita bahas <strong>Persyaratan Sistem (System Requirements)</strong> agar tidak
                ada error saat development.
            </p>

            <h3 class="text-xl font-bold text-slate-900 mt-6">1. Pastikan PHP Versi 8.2 ke Atas</h3>
            <p>
                Laravel 12 berjalan optimal di PHP terbaru. Silakan cek versi PHP kalian dengan perintah
                terminal berikut:
            </p>

            <div class="bg-slate-900 rounded-lg p-4 font-mono text-sm text-green-400 shadow-lg overflow-x-auto">
                <code>php -v</code>
            </div>

            <p>
                Jika outputnya menunjukkan versi di bawah 8.2, silakan update XAMPP/Laragon kalian terlebih
                dahulu.
            </p>

            {{-- lesson image --}}
            <figure class="my-8">
                <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=2070&auto=format&fit=crop"
                    class="w-full rounded-2xl shadow-lg border border-slate-200" alt="Code Screenshot">
                <figcaption class="text-center text-sm text-slate-500 mt-2 italic">Contoh struktur folder
                    Laravel 12 yang baru.</figcaption>
            </figure>

            <h3 class="text-xl font-bold text-slate-900 mt-6">2. Konfigurasi .env</h3>
            <p>
                Jangan lupa menduplikasi file <code>.env.example</code> menjadi <code>.env</code> dan atur
                koneksi database kalian seperti di bawah ini:
            </p>
            <ul class="list-disc pl-6 space-y-2 marker:text-primary-600">
                <li><strong>DB_CONNECTION</strong>: mysql</li>
                <li><strong>DB_HOST</strong>: 127.0.0.1</li>
                <li><strong>DB_PORT</strong>: 3306</li>
            </ul>

            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg my-6">
                <p class="text-blue-700 font-medium text-sm">
                    <i class="ph-fill ph-info mr-1"></i> <strong>Pro Tip:</strong>
                    Gunakan <code>php artisan key:generate</code> setelah membuat file .env agar aplikasi bisa
                    berjalan.
                </p>
            </div>
        </div>

        <div class="mt-12 mb-20">
            <h3 class="text-lg font-bold text-slate-900 mb-4">Materi Pendukung</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <a href="#"
                    class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-primary-500 hover:bg-primary-50 transition group">
                    <div class="w-10 h-10 rounded-lg bg-red-100 text-red-600 flex items-center justify-center text-xl">
                        <i class="ph-fill ph-file-pdf"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-800 group-hover:text-primary-700">Slide
                            Presentasi Modul 1.pdf</p>
                        <p class="text-xs text-slate-500">2.4 MB</p>
                    </div>
                    <i class="ph-bold ph-download-simple ml-auto text-slate-400 group-hover:text-primary-600"></i>
                </a>

                {{-- lesson file --}}
                <a href="#"
                    class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-primary-500 hover:bg-primary-50 transition group">
                    <div
                        class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                        <i class="ph-fill ph-code"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-800 group-hover:text-primary-700">Source Code
                            Starter.zip</p>
                        <p class="text-xs text-slate-500">10 MB</p>
                    </div>
                    <i class="ph-bold ph-download-simple ml-auto text-slate-400 group-hover:text-primary-600"></i>
                </a>
            </div>
        </div>

    </div>
</div>
