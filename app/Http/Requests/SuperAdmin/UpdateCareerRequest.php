<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerRequest extends FormRequest
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
            'company_name' => 'required',
            'category' => 'required|in:1,2,3,4',
            'position' => 'required',
            'url' => 'url|nullable',
            'slug' => 'required|unique:careers,slug,' . $this->route('career')->id,
            'description' => 'required',
            'image' => 'image|file|max:2048|nullable',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'in' => 'Pilihan :attribute tidak valid.',
            'url' => 'Kolom :attribute harus berupa URL yang valid.',
            'unique' => 'Kolom :attribute sudah ada yang menggunakan.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'file' => 'Kolom :attribute harus berupa berkas.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max kilobita.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'company_name' => 'Nama Perusahaan',
            'category' => 'Kategori',
            'position' => 'Posisi',
            'url' => 'URL',
            'slug' => 'Slug',
            'description' => 'Deskripsi',
            'image' => 'Gambar',
        ];
    }
}
