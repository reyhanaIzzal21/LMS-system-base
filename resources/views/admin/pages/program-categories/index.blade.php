@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Program Categories</h1>
                <p class="text-slate-500 text-sm mt-1">Kelola kategori program seperti Reguler, Intensif, Online.</p>
            </div>
            <a href="{{ route('program-categories.create') }}"
                class="bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 transition-all duration-300 flex items-center gap-2 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Kategori</span>
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Slug</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Deskripsi</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($categories as $index => $category)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-semibold text-slate-800">{{ $category->name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <code
                                    class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-600">{{ $category->slug }}</code>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-500 line-clamp-2">{{ $category->description ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('program-categories.edit', $category->id) }}"
                                        class="text-slate-500 hover:text-[#5d87ff] p-2 hover:bg-blue-50 rounded-full transition-colors"
                                        title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button type="button"
                                        onclick="openDeleteModal(
                                            '{{ route('program-categories.destroy', $category->id) }}',
                                            'Apakah anda yakin ingin menghapus kategori <strong>{{ $category->name }}</strong>? Tindakan ini tidak dapat dibatalkan.')"
                                        class="text-slate-500 hover:text-red-500 p-2 hover:bg-red-50 rounded-full transition-colors"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="bg-blue-50 p-4 rounded-full mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#5d87ff]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-800">Belum Ada Kategori</h3>
                                    <p class="text-slate-500 mb-6 text-center max-w-sm">Buat kategori program untuk
                                        mengelompokkan program bimbel Anda.</p>
                                    <a href="{{ route('program-categories.create') }}"
                                        class="bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-6 py-2 rounded-full shadow transition-all">
                                        Buat Kategori Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
