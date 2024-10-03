<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateLaporanRequest extends FormRequest
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
            'slug' => 'required|unique:laporans,slug,' . $this->route('laporan')->id,
            'laporan' => 'file|mimes:pdf|max:51200',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Kolom Judul wajib diisi.',
            'title.string' => 'Kolom Judul harus berupa teks.',
            'title.max' => 'Kolom Judul maksimal 255 karakter.',
            'slug.required' => 'Kolom Slug wajib diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'laporan.required' => 'Kolom Laporan wajib diisi.',
            'laporan.file' => 'Kolom Laporan harus berupa berkas.',
            'laporan.mimes' => 'Kolom Laporan harus berupa berkas berformat PDF.',
            'laporan.max' => 'Kolom Laporan maksimal 51200 kilobyte.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Judul',
            'slug' => 'Slug',
            'laporan' => 'Laporan',
        ];
    }
}
