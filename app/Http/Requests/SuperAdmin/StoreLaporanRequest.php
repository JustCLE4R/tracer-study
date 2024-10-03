<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreLaporanRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:laporans',
            'laporan' => 'required|file|mimes:pdf|max:51200',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => ':attribute wajib diisi.',
            'title.string' => ':attribute harus berupa teks.',
            'title.max' => ':attribute maksimal 255 karakter.',
            'slug.required' => ':attribute wajib diisi.',
            'slug.unique' => ':attribute sudah digunakan.',
            'laporan.required' => ':attribute wajib diisi.',
            'laporan.file' => ':attribute harus berupa berkas.',
            'laporan.mimes' => ':attribute harus berupa berkas berformat PDF.',
            'laporan.max' => ':attribute maksimal 51200 kilobyte.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Judul',
            'slug' => 'Slug',
            'laporan' => 'File Laporan',
        ];
    }
}
