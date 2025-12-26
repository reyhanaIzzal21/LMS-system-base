@extends('admin.layouts.app')
{{-- Asumsi Anda punya layout admin terpisah. Jika tidak, sesuaikan dengan layout utama --}}

@section('title')
    Detail Program: Intensif UTBK SNBT 2025
@endsection

@section('content')
    <div class="min-h-screen bg-slate-50 pb-20">

        <div class="bg-white border-b border-slate-200 shadow-sm z-20 mt-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row gap-8 items-start">

                    <div class="w-full md:w-64 flex-shrink-0">
                        <div
                            class="aspect-video rounded-xl overflow-hidden border border-slate-200 shadow-sm relative group">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop"
                                class="w-full h-full object-cover" alt="Thumbnail">
                        </div>
                    </div>

                    <div class="flex-1 w-full">
                        <div class="flex items-center gap-3 mb-3">
                            <span
                                class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wider border border-purple-200">
                                Intensif UTBK
                            </span>
                            <span
                                class="flex items-center gap-1 text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded border border-slate-200">
                                <i class="ti ti-calendar-clock"></i> Berakhir: 20 Mei 2025
                            </span>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Program Super Intensif UTBK SNBT 2025
                        </h1>
                        <p class="text-slate-500 text-lg mb-4">Batch Gelombang 1 - Fokus Skolastik & Literasi</p>

                        <div class="flex flex-wrap items-end gap-4 mt-auto">
                            <div>
                                <p class="text-xs text-slate-400 mb-1">Harga Program</p>
                                <div class="flex items-end gap-2">
                                    <span class="text-2xl font-bold text-primary-600">Rp 850.000</span>
                                    <span class="text-sm text-slate-400 line-through mb-1">Rp 1.200.000</span>
                                </div>
                            </div>

                            <div class="border-l border-slate-200 pl-4 ml-2">
                                <p class="text-xs text-slate-400 mb-1">Total Siswa</p>
                                <p class="text-xl font-bold text-slate-800">145 <span
                                        class="text-sm font-normal text-slate-500">Siswa</span></p>
                            </div>

                            <div class="border-l border-slate-200 pl-4">
                                <p class="text-xs text-slate-400 mb-1">Total Guru</p>
                                <p class="text-xl font-bold text-slate-800">8 <span
                                        class="text-sm font-normal text-slate-500">Pengajar</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('programs.index') }}"
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-arrow-left"></i> Back
                        </a>
                        <button
                            class="flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 font-bold rounded-lg hover:bg-slate-50 transition">
                            <i class="ti ti-settings"></i> Settings
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <nav class="flex space-x-8 border-b border-slate-200" aria-label="Tabs">
                    <a href="#description"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="description">
                        <i class="ti ti-file-text mr-2 text-lg"></i>
                        Deskripsi & Benefit
                    </a>

                    <a href="#teachers"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="teachers">
                        <i class="ti ti-chalkboard-teacher mr-2 text-lg"></i>
                        Daftar Guru
                        <span class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">8</span>
                    </a>

                    <a href="#students"
                        class="tab-link group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm transition-all"
                        data-target="students">
                        <i class="ti ti-users mr-2 text-lg"></i>
                        Data Siswa
                        <span class="ml-2 bg-slate-100 text-slate-600 py-0.5 px-2 rounded-full text-xs">145</span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div id="description" class="tab-content hidden space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
                    <div class="flex justify-between items-start mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-xl font-bold text-slate-900">Tentang Program</h2>
                    </div>

                    <div class="grid lg:grid-cols-3 gap-12">
                        <div class="lg:col-span-2 prose prose-slate max-w-none text-slate-600">
                            <p>
                                Program Intensif UTBK SNBT 2025 dirancang khusus untuk siswa kelas 12 dan gap year yang
                                ingin memaksimalkan persiapan menuju PTN impian.
                                Dengan metode belajar <strong>Conceptual Understanding</strong>, siswa tidak hanya menghafal
                                rumus tapi memahami konsep dasar.
                            </p>
                            <p>
                                Kurikulum disesuaikan dengan standar terbaru SNPMB BPPP Kemendikbudristek.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                            <h3 class="font-bold text-slate-900 mb-4">Benefit Program</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3 text-sm text-slate-700">
                                    <i class="ti ti-circle-check text-green-500 text-lg mt-0.5"></i>
                                    <span>Akses LMS Seumur Hidup</span>
                                </li>
                                <li class="flex items-start gap-3 text-sm text-slate-700">
                                    <i class="ti ti-circle-check text-green-500 text-lg mt-0.5"></i>
                                    <span>20x Tryout IRT System</span>
                                </li>
                                <li class="flex items-start gap-3 text-sm text-slate-700">
                                    <i class="ti ti-circle-check text-green-500 text-lg mt-0.5"></i>
                                    <span>Konsultasi Jurusan by Psikolog</span>
                                </li>
                                <li class="flex items-start gap-3 text-sm text-slate-700">
                                    <i class="ti ti-circle-check text-green-500 text-lg mt-0.5"></i>
                                    <span>Modul Cetak Eksklusif (Dikirim ke Rumah)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="teachers" class="tab-content hidden">
                <div class="flex justify-between items-center mb-6">
                    <div class="relative w-full sm:w-72">
                        <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari nama atau email guru..."
                            class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 text-sm">
                    </div>
                    <button
                        class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary-600/20 transition">
                        <i class="ti ti-plus"></i> Tambah Guru
                    </button>
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
                                        class="py-2.5 px-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:border-primary-600 hover:text-primary-600 hover:bg-primary-50 transition text-sm shadow-sm">
                                        Detail
                                    </button>
                                    <button
                                        class="py-2.5 px-4 bg-red-600 border border-red-600 text-white font-bold rounded-xl hover:bg-red-700 hover:border-red-700 transition text-sm shadow-sm">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div id="students" class="tab-content hidden">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="relative w-full sm:w-72">
                            <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" placeholder="Cari nama atau email siswa..."
                                class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 text-sm">
                        </div>
                        <button
                            class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary-600/20 transition w-full sm:w-auto justify-center">
                            <i class="ti ti-plus"></i> Tambah Siswa
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-600">
                            <thead class="bg-slate-50 text-slate-900 font-bold border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-4">Nama Siswa</th>
                                    <th class="px-6 py-4">Tanggal Daftar</th>
                                    <th class="px-6 py-4">Progress</th>
                                    <th class="px-6 py-4">Status Pembayaran</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-500 text-xs">
                                                AD</div>
                                            <div>
                                                <p class="font-bold text-slate-900">Aditya Pratama</p>
                                                <p class="text-xs text-slate-400">aditya@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">20 Des 2024</td>
                                    <td class="px-6 py-4">
                                        <div class="w-24 bg-slate-200 rounded-full h-1.5 mb-1">
                                            <div class="bg-green-500 h-1.5 rounded-full" style="width: 45%"></div>
                                        </div>
                                        <span class="text-xs text-slate-500">45% Completed</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Lunas
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-slate-400 hover:text-primary-600 p-1"><i
                                                class="ti ti-eye text-lg"></i></button>
                                        <button class="text-slate-400 hover:text-red-600 p-1"><i
                                                class="ti ti-trash text-lg"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center font-bold text-purple-600 text-xs">
                                                SA</div>
                                            <div>
                                                <p class="font-bold text-slate-900">Siti Aminah</p>
                                                <p class="text-xs text-slate-400">siti.am@yahoo.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">22 Des 2024</td>
                                    <td class="px-6 py-4">
                                        <div class="w-24 bg-slate-200 rounded-full h-1.5 mb-1">
                                            <div class="bg-primary-500 h-1.5 rounded-full" style="width: 10%"></div>
                                        </div>
                                        <span class="text-xs text-slate-500">10% Completed</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-600 animate-pulse"></span>
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-slate-400 hover:text-primary-600 p-1"><i
                                                class="ti ti-eye text-lg"></i></button>
                                        <button class="text-slate-400 hover:text-red-600 p-1"><i
                                                class="ti ti-trash text-lg"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Menampilkan 1-10 dari 145 data</span>
                        <div class="flex gap-1">
                            <button
                                class="px-3 py-1 border border-slate-200 rounded text-slate-500 hover:bg-slate-50 text-xs">Prev</button>
                            <button
                                class="px-3 py-1 border border-slate-200 rounded text-slate-500 hover:bg-slate-50 text-xs">Next</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab-link');
            const contents = document.querySelectorAll('.tab-content');

            // 1. Function to Switch Tab
            function switchTab(targetId) {
                // Hide all contents
                contents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Remove active styling from all tabs
                tabs.forEach(tab => {
                    tab.classList.remove('border-primary-600', 'text-primary-600');
                    tab.classList.add('border-transparent', 'text-slate-500', 'hover:text-slate-700',
                        'hover:border-slate-300');
                });

                // Show Target Content
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                }

                // Add active styling to clicked tab
                const activeTab = document.querySelector(`[data-target="${targetId}"]`);
                if (activeTab) {
                    activeTab.classList.remove('border-transparent', 'text-slate-500', 'hover:text-slate-700',
                        'hover:border-slate-300');
                    activeTab.classList.add('border-primary-600', 'text-primary-600');
                }
            }

            // 2. Event Listener for Tab Clicks
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    // Kita biarkan default behavior href="#..." berjalan agar URL berubah
                    const target = this.getAttribute('data-target');

                    // Panggil fungsi switch UI
                    switchTab(target);
                });
            });

            // 3. Logic: Check URL Hash on Page Load (Persistence)
            const hash = window.location.hash.substring(1); // remove '#'
            if (hash && document.getElementById(hash)) {
                switchTab(hash);
            } else {
                // Default to first tab if no hash
                switchTab('description');
            }

            // 4. Handle Browser Back/Forward Buttons
            window.addEventListener('hashchange', function() {
                const newHash = window.location.hash.substring(1);
                if (newHash && document.getElementById(newHash)) {
                    switchTab(newHash);
                }
            });
        });
    </script>
@endsection
