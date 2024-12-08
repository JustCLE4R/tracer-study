<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionerStakeHolderRequest extends FormRequest
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
        $rules = [];

        for ($i = 1; $i <= 5; $i++) {
            $rules["b_$i"] = ['required', 'string', 'max:255'];
        }
        $rules["b_6"] = ['required', 'email'];

        $rules["c_1"] = ['nullable', 'array', 'max:5', 'in:a,b,c,d,e'];

        $rules["d_1"] = ['nullable', 'array', 'max:5', 'in:a,b,c,d,e'];

        for ($i = 1; $i <= 18; $i++) {
            $rules["e_$i"] = ['required', 'integer', 'between:0,4'];
            $rules["f_$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["g_1"] = ['required', 'string', 'max:255'];
        $rules["i_1"] = ['required', 'string', 'max:255'];
        $rules["j_1"] = ['required', 'string', 'max:255'];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute harus diisi',
            'between' => 'Kolom :attribute harus berisi angka antara :min sampai :max',
            'integer' => 'Kolom :attribute harus berupa angka',
            'string' => 'Kolom :attribute harus berupa teks',
            'array' => 'Kolom :attribute harus berupa array',
            'in' => 'Kolom :attribute harus berisi :values',
            'min' => 'Kolom :attribute harus berisi minimal :min karakter',
            'max' => 'Kolom :attribute harus berisi maksimal :max karakter',
        ];
    }

    public function attributes(): array
    {
        $attributes = [];
        
        $attributes["c_1"] = "c_1"; //C
        $attributes["d_1"] = "d_1"; //D

        for ($i = 1; $i <= 18; $i++) {
            $attributes["e_$i"] = "e_$i";
            $attributes["f_$i"] = "f_$i";
        }

        $attributes["h_1"] = "h_1"; //H
        $attributes["i_1"] = "i_1"; //I
        $attributes["j_1"] = "j_1"; //J

        return $attributes;
    }
}
