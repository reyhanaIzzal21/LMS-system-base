@extends('user.layouts.app')

@section('name')
    Formulir Pendaftaran - EduSmart
@endsection

@section('content')
    <div class="bg-slate-50 border-b border-slate-200 pt-28 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Formulir Pendaftaran</h1>
                    <p class="text-slate-500 text-sm">Lengkapi data diri kamu untuk memulai akses belajar.</p>
                </div>
                
                <div class="flex items-center gap-2 text-sm font-medium">
                    <div class="flex items-center gap-2 text-primary-700">
                        <span class="w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-bold">1</span>
                        <span>Isi Data</span>
                    </div>
                    <div class="w-8 h-px bg-slate-300"></div>
                    <div class="flex items-center gap-2 text-slate-400">
                        <span class="w-6 h-6 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-xs font-bold">2</span>
                        <span>Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="#" method="POST"> @csrf
                <div class="grid lg:grid-cols-3 gap-10">
                    
                    <div class="lg:col-span-2 space-y-8">
                        
                        <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-primary-600 flex items-center justify-center text-xl">
                                    <i class="ph-bold ph-user"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-900">Informasi Siswa</h2>
                                    <p class="text-xs text-slate-500">Data ini akan digunakan untuk sertifikat dan akun.</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Contoh: Aditya Pratama" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="email@contoh.com" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-bold text-sm">+62</span>
                                        <input type="number" name="phone" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="81234567890" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
                                <div class="w-10 h-10 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center text-xl">
                                    <i class="ph-bold ph-graduation-cap"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-900">Asal Sekolah</h2>
                                    <p class="text-xs text-slate-500">Untuk menyesuaikan materi pembelajaran.</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Sekolah <span class="text-red-500">*</span></label>
                                    <input type="text" name="school_name" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Contoh: SMAN 1 Surabaya" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Jenjang / Kelas <span class="text-red-500">*</span></label>
                                    <select name="grade" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition bg-white" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <option value="10">Kelas 10 SMA</option>
                                        <option value="11">Kelas 11 SMA</option>
                                        <option value="12">Kelas 12 SMA</option>
                                        <option value="gap_year">Gap Year / Alumni</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Kelulusan <span class="text-slate-400 font-normal">(Opsional)</span></label>
                                    <input type="number" name="graduation_year" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Contoh: 2025">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
                                <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                                    <i class="ph-bold ph-users-three"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-900">Data Orang Tua / Wali</h2>
                                    <p class="text-xs text-slate-500">Untuk laporan perkembangan belajar (Report Card).</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Orang Tua <span class="text-red-500">*</span></label>
                                    <input type="text" name="parent_name" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Nama Ayah/Ibu" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">No. WhatsApp Ortu <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-bold text-sm">+62</span>
                                        <input type="number" name="parent_phone" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="81234567890" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
                                <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-xl">
                                    <i class="ph-bold ph-map-pin"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-900">Alamat Domisili</h2>
                                    <p class="text-xs text-slate-500">Untuk pengiriman modul fisik (jika ada).</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                                    <textarea name="address" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Nama Jalan, No. Rumah, RT/RW" required></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Provinsi <span class="text-red-500">*</span></label>
                                    <select name="province" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition bg-white" required>
                                        <option value="">Pilih Provinsi</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kota/Kabupaten <span class="text-red-500">*</span></label>
                                    <select name="city" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition bg-white" required>
                                        <option value="">Pilih Kota</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Malang">Malang</option>
                                        </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kecamatan <span class="text-red-500">*</span></label>
                                    <input type="text" name="district" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Contoh: Sukolilo" required>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Desa/Kelurahan</label>
                                        <input type="text" name="village" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="Contoh: Gebang">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Kode Pos</label>
                                        <input type="number" name="postal_code" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition" placeholder="60111">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="sticky top-28 space-y-6">
                            
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-lg overflow-hidden">
                                <div class="bg-slate-50 p-4 border-b border-slate-200">
                                    <h3 class="font-bold text-slate-900">Ringkasan Pesanan</h3>
                                </div>
                                <div class="p-6">
                                    <div class="flex gap-4 mb-6">
                                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop" class="w-20 h-20 rounded-lg object-cover border border-slate-100" alt="Thumbnail">
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-900 line-clamp-2">Program Super Intensif UTBK SNBT 2025</h4>
                                            <p class="text-xs text-slate-500 mt-1">Batch Gelombang 1</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mb-6 border-t border-slate-100 pt-4">
                                        <div class="flex justify-between text-sm">
                                            <span class="text-slate-600">Harga Normal</span>
                                            <span class="text-slate-400 line-through">Rp 1.200.000</span>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-green-600 font-medium">Diskon Promo</span>
                                            <span class="text-green-600 font-bold">- Rp 350.000</span>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-slate-600">Biaya Admin</span>
                                            <span class="text-slate-900 font-bold">Rp 0 (Gratis)</span>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center border-t border-slate-100 pt-4 mb-6">
                                        <span class="font-bold text-slate-900">Total Bayar</span>
                                        <span class="text-2xl font-extrabold text-primary-600">Rp 850.000</span>
                                    </div>

                                    <button type="submit" class="w-full py-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-lg shadow-primary-600/30 flex items-center justify-center gap-2 group">
                                        Lanjut Pembayaran
                                        <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                    </button>

                                    <p class="text-center text-xs text-slate-400 mt-4">
                                        <i class="ph-fill ph-lock-key"></i> Data Anda terenkripsi dengan aman.
                                    </p>
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 items-start">
                                <i class="ph-fill ph-info text-primary-600 text-xl mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Pastikan nomor WhatsApp aktif. Kami akan mengirimkan invoice dan akses akun melalui WA.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection