<div id="students" class="tab-content hidden">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="relative w-full sm:w-72">
                <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" placeholder="Cari nama atau email siswa..."
                    class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 text-sm">
            </div>
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
