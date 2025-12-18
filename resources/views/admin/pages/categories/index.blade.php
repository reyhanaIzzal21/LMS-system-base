@extends('admin.layouts.app')

@section('style')
    <style>
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 300ms, transform 300ms;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Category Management</h2>
                <p class="text-slate-500 text-sm mt-1">Manage your product categories efficiently.</p>
            </div>

            <button onclick="openModal('createCategoryModal')"
                class="group bg-[#5d87ff] hover:bg-[#4a70e0] text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 transition-all duration-300 flex items-center gap-2 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:rotate-90"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>New Category</span>
            </button>
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

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead
                        class="bg-slate-50 text-slate-500 uppercase text-xs font-bold tracking-wider border-b border-slate-200">
                        <tr>
                            <th class="py-4 px-6 w-16 text-center">#</th>
                            <th class="py-4 px-6">Category Name</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($categories as $category)
                            <tr class="hover:bg-slate-50 transition-colors duration-200 group">
                                <td class="py-4 px-6 text-center text-slate-400 font-mono text-sm">
                                    {{ $loop->iteration }}
                                </td>
                                <td
                                    class="py-4 px-6 font-medium text-slate-700 group-hover:text-[#5d87ff] transition-colors">
                                    {{ $category->name }}
                                </td>
                                <td class="py-4 px-6 text-right space-x-2">

                                    <button onclick="openModal('editCategoryModal{{ $category->id }}')"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-amber-50 text-amber-600 rounded-md hover:bg-amber-100 transition border border-amber-100 text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>

                                    <button type="button"
                                        onclick="openDeleteModal(
                                    '{{ route('categories.destroy', $category->id) }}',
                                    'Apakah anda yakin ingin menghapus <strong>{{ $category->name }}</strong>? Tindakan ini tidak dapat dibatalkan.')"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 text-red-600 rounded-md hover:bg-red-100 transition border border-red-100 text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                            <div id="editCategoryModal{{ $category->id }}"
                                class="fixed inset-0 z-1000 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm hidden transition-opacity">
                                <div
                                    class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 transform transition-all scale-100">
                                    <div class="flex justify-between items-center mb-5">
                                        <h3 class="text-xl font-bold text-slate-800">Edit Category</h3>
                                        <button onclick="closeModal('editCategoryModal{{ $category->id }}')"
                                            class="text-slate-400 hover:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-5">
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Category
                                                Name</label>
                                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                                class="w-full border-slate-300 rounded-lg shadow-sm focus:border-[#5d87ff] focus:ring focus:ring-[#5d87ff]/20 px-4 py-2.5 transition-all @error('name') border-red-500 @enderror"
                                                placeholder="e.g. Electronics">
                                            @error('name')
                                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-2 border-t border-slate-100">
                                            <button type="button"
                                                onclick="closeModal('editCategoryModal{{ $category->id }}')"
                                                class="px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition font-medium">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] shadow-md shadow-blue-500/20 transition font-medium">
                                                Update Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- <div id="deleteCategoryModal{{ $category->id }}"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm hidden">
                                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
                                    <div
                                        class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-lg font-bold text-slate-800 mb-2">Delete Category?</h3>
                                    <p class="text-sm text-slate-500 mb-6">
                                        Are you sure you want to delete <strong
                                            class="text-slate-700">{{ $category->name }}</strong>? This action cannot be
                                        undone.
                                    </p>

                                    <div class="flex justify-center space-x-3">
                                        <button onclick="closeModal('deleteCategoryModal{{ $category->id }}')"
                                            class="px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition font-medium w-full">
                                            Cancel
                                        </button>

                                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                            class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 shadow-md shadow-red-500/20 transition font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        @empty
                            <tr>
                                <td colspan="3" class="py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-slate-400">
                                        <svg class="w-16 h-16 mb-4 text-slate-200" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                        </svg>
                                        <p class="text-lg font-medium text-slate-500">No categories found</p>
                                        <p class="text-sm text-slate-400">Get started by creating a new category.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="createCategoryModal"
        class="fixed inset-0 z-1000 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 transform transition-all scale-100">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-xl font-bold text-slate-800">Create New Category</h3>
                <button onclick="closeModal('createCategoryModal')" class="text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Category Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-[#5d87ff] focus:ring focus:ring-[#5d87ff]/20 px-4 py-2.5 transition-all @error('name') border-red-500 @enderror"
                        placeholder="Enter category name...">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-2 border-t border-slate-100">
                    <button type="button" onclick="closeModal('createCategoryModal')"
                        class="px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition font-medium">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-[#5d87ff] text-white rounded-lg hover:bg-[#4a70e0] shadow-md shadow-blue-500/20 transition font-medium">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            // Sedikit delay untuk animasi jika ingin ditambahkan nanti
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
        }

        // Auto open modal jika error validasi
        @if ($errors->any())
            @if (old('_modal_edit_id'))
                // Pastikan controller mengirim old('_modal_edit_id') jika validasi edit gagal
                openModal("editCategoryModal{{ old('_modal_edit_id') }}");
            @else
                openModal("createCategoryModal");
            @endif
        @endif
    </script>
@endsection
