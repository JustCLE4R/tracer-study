<?php
namespace App\Http\Requests\SuperAdmin;

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
            'telepon' => 'numeric|sometimes|required',
            'email' => 'email|max:255|sometimes|required',
            'linkedin' => 'nullable|url|sometimes',
            'facebook' => 'nullable|url|sometimes',
            'tgl_lulus' => 'date|before:today|sometimes|required',
            'tgl_yudisium' => 'date|before:today|sometimes|required',
            'tgl_wisuda' => 'date|before:today|sometimes|required',
            'judul_tugas_akhir' => 'string|max:255|sometimes|required',
            'provinsi' => 'string|max:255|sometimes|required',
            'kabupaten' => 'string|max:255|sometimes|required',
            'kecamatan' => 'string|max:255|sometimes|required',
            'alamat' => 'string|max:255|sometimes|required',
        ];
    }

    public function messages(): array
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
        ];
    }

    public function attributes(): array
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
        ];
    }
}
