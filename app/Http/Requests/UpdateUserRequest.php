<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'telepon' => 'required|numeric',
            'email' => 'email|max:255',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'tgl_lulus' => 'required|date|before:today',
            'tgl_yudisium' => 'required|date|before:today',
            'tgl_wisuda' => 'required|date|before:today',
            'judul_tugas_akhir' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'masa_studi_semester' => 'required|numeric|between:7,14',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'url' => 'Kolom :attribute harus berupa URL yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid',
            'before' => 'Kolom :attribute harus sebelum tanggal hari ini.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'between' => 'Kolom :attribute harus diantara :min dan :max.',
        ];
    }

    public function attributes()
    {
        return [
            'telepon' => 'Telepon',
            'email' => 'Email',
            'linkedin' => 'Linkedin',
            'facebook' => 'Facebook',
            'tgl_lulus' => 'Tanggal Lulus',
            'tgl_yudisium' => 'Tanggal Yudisium',
            'tgl_wisuda' => 'Tanggal Wisuda',
            'judul_tugas_akhir' => 'Judul Tugas Akhir',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'alamat' => 'Alamat',
            'masa_studi_semester' => 'Masa Studi (Semester)',
        ];
    }
}
