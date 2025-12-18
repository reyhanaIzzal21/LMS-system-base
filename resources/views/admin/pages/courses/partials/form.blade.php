@php
    $isEdit = isset($course);
@endphp


<div>
    <label class="font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" class="w-full border p-2 rounded">
    @error('title')
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



<script>
    const premiumSelect = document.getElementById('is_premium');
    const priceSection = document.getElementById('price_section');


    function togglePrice() {
        priceSection.classList.toggle('hidden', premiumSelect.value !== '1');
    }


    premiumSelect.addEventListener('change', togglePrice);
    togglePrice();
</script>
