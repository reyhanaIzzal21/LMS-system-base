<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_category_id' => ['nullable', 'uuid', 'exists:program_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'is_premium' => ['nullable', 'boolean'],
            'price' => ['required_if:is_premium,1', 'nullable', 'numeric', 'min:0'],
            'promotional_price' => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'is_active' => ['nullable', 'boolean'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'end_date' => ['nullable', 'date', 'after:today'],
            'benefits' => ['nullable', 'array'],
            'benefits.*' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul program wajib diisi.',
            'sub_title.required' => 'Sub judul program wajib diisi.',
            'description.required' => 'Deskripsi program wajib diisi.',
            'price.required_if' => 'Harga wajib diisi untuk program premium.',
            'promotional_price.lt' => 'Harga promo harus lebih kecil dari harga normal.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
            'end_date.after' => 'Tanggal berakhir harus setelah hari ini.',
        ];
    }
}
