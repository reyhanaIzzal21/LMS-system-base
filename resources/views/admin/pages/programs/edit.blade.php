@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('programs.index') }}"
                class="text-slate-500 hover:text-[#5d87ff] flex items-center gap-2 text-sm mb-4 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Program</h1>
            <p class="text-slate-500 text-sm mt-1">Perbarui informasi program.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <form action="{{ route('programs.update', $programData->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Program <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $programData->title) }}"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('title') border-red-500 @enderror"
                            placeholder="Contoh: Kelas UTBK Intensif 2024">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="program_category_id"
                            class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                        <select name="program_category_id" id="program_category_id"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('program_category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori (Opsional) --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('program_category_id', $programData->program_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('program_category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="sub_title" class="block text-sm font-semibold text-slate-700 mb-2">Sub Judul <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="sub_title" id="sub_title"
                        value="{{ old('sub_title', $programData->sub_title) }}"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('sub_title') border-red-500 @enderror"
                        placeholder="Penjelasan singkat tentang program">
                    @error('sub_title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi <span
                            class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="5"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('description') border-red-500 @enderror"
                        placeholder="Deskripsi lengkap tentang program ini">{{ old('description', $programData->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe Program</label>
                        <div class="flex items-center gap-4 mt-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_premium" value="0"
                                    {{ old('is_premium', $programData->is_premium ? '1' : '0') == '0' ? 'checked' : '' }}
                                    class="w-4 h-4 text-[#5d87ff] border-slate-300 focus:ring-[#5d87ff]"
                                    onclick="togglePriceFields(false)">
                                <span class="text-sm text-slate-600">Gratis</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_premium" value="1"
                                    {{ old('is_premium', $programData->is_premium ? '1' : '0') == '1' ? 'checked' : '' }}
                                    class="w-4 h-4 text-[#5d87ff] border-slate-300 focus:ring-[#5d87ff]"
                                    onclick="togglePriceFields(true)">
                                <span class="text-sm text-slate-600">Berbayar</span>
                            </label>
                        </div>
                    </div>

                    <div id="price-field"
                        class="{{ old('is_premium', $programData->is_premium ? '1' : '0') == '1' ? '' : 'hidden' }}">
                        <label for="price" class="block text-sm font-semibold text-slate-700 mb-2">Harga (Rp)</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $programData->price) }}"
                            min="0"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('price') border-red-500 @enderror"
                            placeholder="100000">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="promo-field"
                        class="{{ old('is_premium', $programData->is_premium ? '1' : '0') == '1' ? '' : 'hidden' }}">
                        <label for="promotional_price" class="block text-sm font-semibold text-slate-700 mb-2">Harga Promo
                            (Rp)</label>
                        <input type="number" name="promotional_price" id="promotional_price"
                            value="{{ old('promotional_price', $programData->promotional_price) }}" min="0"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('promotional_price') border-red-500 @enderror"
                            placeholder="Opsional">
                        @error('promotional_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="thumbnail" class="block text-sm font-semibold text-slate-700 mb-2">Thumbnail</label>
                        @if ($programData->thumbnail)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $programData->thumbnail) }}" alt="Current thumbnail"
                                    class="w-32 h-20 object-cover rounded-lg border border-slate-200">
                                <p class="text-xs text-slate-400 mt-1">Thumbnail saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('thumbnail') border-red-500 @enderror">
                        <p class="text-xs text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah</p>
                        @error('thumbnail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal
                            Berakhir</label>
                        <input type="date" name="end_date" id="end_date"
                            value="{{ old('end_date', $programData->end_date?->format('Y-m-d')) }}"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all @error('end_date') border-red-500 @enderror">
                        @error('end_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Benefits Section -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <label class="block text-sm font-semibold text-slate-700">Benefits / Fasilitas</label>
                        <button type="button" onclick="addBenefit()"
                            class="text-sm text-[#5d87ff] hover:text-[#4a70e0] font-medium flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Benefit
                        </button>
                    </div>

                    <div id="benefits-container" class="space-y-3">
                        @php
                            $benefits = old('benefits', $programData->benefits->pluck('name')->toArray());
                        @endphp
                        @if (count($benefits) > 0)
                            @foreach ($benefits as $benefit)
                                <div class="benefit-item flex items-center gap-2">
                                    <input type="text" name="benefits[]" value="{{ $benefit }}"
                                        class="flex-1 px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all"
                                        placeholder="Contoh: Video pembelajaran HD">
                                    <button type="button" onclick="removeBenefit(this)"
                                        class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="benefit-item flex items-center gap-2">
                                <input type="text" name="benefits[]"
                                    class="flex-1 px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all"
                                    placeholder="Contoh: Video pembelajaran HD">
                                <button type="button" onclick="removeBenefit(this)"
                                    class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('programs.index') }}"
                        class="px-6 py-3 text-slate-600 hover:text-slate-800 font-medium rounded-lg hover:bg-slate-100 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-[#5d87ff] hover:bg-[#4a70e0] text-white font-medium rounded-lg shadow-lg shadow-blue-500/30 transition-all">
                        Perbarui Program
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function togglePriceFields(show) {
            document.getElementById('price-field').classList.toggle('hidden', !show);
            document.getElementById('promo-field').classList.toggle('hidden', !show);
        }

        function addBenefit() {
            const container = document.getElementById('benefits-container');
            const html = `
                <div class="benefit-item flex items-center gap-2">
                    <input type="text" name="benefits[]"
                        class="flex-1 px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#5d87ff] focus:border-[#5d87ff] transition-all"
                        placeholder="Contoh: Video pembelajaran HD">
                    <button type="button" onclick="removeBenefit(this)"
                        class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 12H4" />
                        </svg>
                    </button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removeBenefit(btn) {
            const items = document.querySelectorAll('.benefit-item');
            if (items.length > 1) {
                btn.closest('.benefit-item').remove();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const isPremium = document.querySelector('input[name="is_premium"]:checked');
            if (isPremium) {
                togglePriceFields(isPremium.value === '1');
            }
        });
    </script>
@endsection
