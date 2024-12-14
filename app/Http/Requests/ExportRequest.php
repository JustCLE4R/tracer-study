<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
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
            'program_studi' => 'nullable|string',
            'fakultas' => 'nullable|string',
            'tahun' => 'nullable|integer|min:1900|max:' . date('Y'),
            'jenisVisualisasi' => 'required|string|in:wirausaha,pekerja,pendidikan,questioner,questioner_stake_holders',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'jenisVisualisasi.in' => 'Jenis Visualisasi harus salah satu dari: wirausaha, pekerja, pendidikan, questioner, questioner_stake_holders.',
            'in' => 'Kolom :attribute tidak valid.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'min' => 'Kolom :attribute minimal :min.',
            'max' => 'Kolom :attribute maksimal :max.',
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
            'program_studi' => 'Program Studi',
            'fakultas' => 'Fakultas',
            'jenisVisualisasi' => 'Jenis Visualisasi',
            'tahun' => 'Tahun',
        ];
    }
}
