<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $courseId = $this->route('course') ?? null; // UUID or null
        $isPremium = filter_var($this->input('is_premium'), FILTER_VALIDATE_BOOLEAN);

        return [
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'title')->ignore($courseId, 'id')
            ],
            'sub_title' => 'required|string|max:255',
            'photo' => ($this->isMethod('post') ? 'nullable|image|max:2048' : 'nullable|image|max:2048'),
            'description' => 'required|string',
            'is_premium' => 'required|boolean',
            'price' => $isPremium ? 'required|integer|min:0' : 'nullable|integer|min:0',
            'promotional_price' => 'nullable|integer|min:0',
            'is_ready' => 'sometimes|boolean',
            'benefits' => 'nullable|array',
            'benefits.*' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Category harus diisi.',
            'category_id.exists' => 'Category tidak ditemukan.',
            'user_id.required' => 'User harus diisi.',
            'title.required' => 'Title harus diisi.',
            'title.unique' => 'Title sudah dipakai.',
            'description.required' => 'Description harus diisi.',
            'is_premium.required' => 'Pilih apakah course premium atau gratis.',
            'price.required' => 'Price harus diisi untuk course premium.',
            'photo.image' => 'File photo harus berupa gambar.',
        ];
    }
}
