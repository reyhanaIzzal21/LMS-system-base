@php
    $isEdit = isset($course);
    $existingBenefits = old('benefits', $isEdit ? $course->benefits->pluck('name')->toArray() : []);
@endphp


<div>
    <label class="font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" class="w-full border p-2 rounded">
    @error('title')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>


<div>
    <label class="font-semibold">Sub Title</label>
    <input type="text" name="sub_title" value="{{ old('sub_title', $course->sub_title ?? '') }}"
        class="w-full border p-2 rounded" placeholder="Penjelasan singkat tentang course">
    @error('sub_title')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>


<div>
    <label class="font-semibold">Category</label>
    <select name="category_id" class="w-full border p-2 rounded">
        <option value="">Select category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $course->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>


<div>
    <label class="font-semibold">Author</label>
    <select name="user_id" class="w-full border p-2 rounded">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" @selected(old('user_id', $course->user_id ?? '') == $user->id)>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>


<div>
    <label class="font-semibold">Description</label>
    <textarea name="description" rows="5" class="w-full border p-2 rounded">{{ old('description', $course->description ?? '') }}</textarea>
</div>


<div>
    <label class="font-semibold">Course Type</label>
    <select name="is_premium" id="is_premium" class="w-full border p-2 rounded">
        <option value="0" @selected(old('is_premium', $course->is_premium ?? 0) == 0)>Free</option>
        <option value="1" @selected(old('is_premium', $course->is_premium ?? 0) == 1)>Premium</option>
    </select>
</div>


<div id="price_section" class="hidden space-y-4">
    <div>
        <label class="font-semibold">Price</label>
        <input type="number" name="price" value="{{ old('price', $course->price ?? '') }}"
            class="w-full border p-2 rounded">
    </div>


    <div>
        <label class="font-semibold">Promotional Price (optional)</label>
        <input type="number" name="promotional_price"
            value="{{ old('promotional_price', $course->promotional_price ?? '') }}" class="w-full border p-2 rounded">
    </div>
</div>


<div>
    <label class="font-semibold">Photo</label>
    <input type="file" name="photo" class="w-full" accept="image/*">


    @if (isset($course) && $course->photo)
        <img src="{{ asset('storage/' . $course->photo) }}" class="w-32 mt-2 rounded">
    @endif
</div>


<!-- Benefits Section -->
<div class="mt-6">
    <div class="flex items-center justify-between mb-3">
        <label class="font-semibold">Benefits / Fasilitas</label>
        <button type="button" onclick="addBenefit()"
            class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Benefit
        </button>
    </div>

    <div id="benefits-container" class="space-y-3">
        @if (count($existingBenefits) > 0)
            @foreach ($existingBenefits as $index => $benefit)
                <div class="benefit-item flex items-center gap-2">
                    <input type="text" name="benefits[]" value="{{ $benefit }}"
                        class="flex-1 border p-2 rounded" placeholder="Contoh: Video pembelajaran HD">
                    <button type="button" onclick="removeBenefit(this)"
                        class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                </div>
            @endforeach
        @else
            <div class="benefit-item flex items-center gap-2">
                <input type="text" name="benefits[]" class="flex-1 border p-2 rounded"
                    placeholder="Contoh: Video pembelajaran HD">
                <button type="button" onclick="removeBenefit(this)"
                    class="p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>


<script>
    const premiumSelect = document.getElementById('is_premium');
    const priceSection = document.getElementById('price_section');


    function togglePrice() {
        priceSection.classList.toggle('hidden', premiumSelect.value !== '1');
    }

    function addBenefit() {
        const container = document.getElementById('benefits-container');
        const html = `
            <div class="benefit-item flex items-center gap-2">
                <input type="text" name="benefits[]"
                    class="flex-1 border p-2 rounded"
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


    premiumSelect.addEventListener('change', togglePrice);
    togglePrice();
</script>
