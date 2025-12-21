@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="mb-8">
            <a href="{{ route('program-categories.index') }}"
                class="text-slate-500 hover:text-[#5d87ff] flex items-center gap-2 text-sm mb-4 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Kategori Program</h1>
            <p class="text-slate-500 text-sm mt-1">Perbarui informasi kategori program.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <form action="{{ route('program-categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('name') border-red-500 @enderror"
                        placeholder="Contoh: Reguler, Intensif, Online">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('description') border-red-500 @enderror"
                        placeholder="Deskripsi singkat tentang kategori ini (opsional)">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('program-categories.index') }}"
                        class="px-6 py-3 text-slate-600 hover:text-slate-800 font-medium rounded-lg hover:bg-slate-100 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-[#5d87ff] hover:bg-[#4a70e0] text-white font-medium rounded-lg shadow-lg shadow-blue-500/30 transition-all">
                        Perbarui Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
