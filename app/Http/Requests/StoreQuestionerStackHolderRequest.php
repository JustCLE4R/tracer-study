<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionerStackHolderRequest extends FormRequest
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
            $rules["b-$i"] = ['required', 'string', 'max:255'];
        }
        $rules["b-6"] = ['required', 'email'];

        $rules["c-1"] = ['required', 'array', 'min:1', 'max:5'];
        $rules["c-1.*"] = ['in:a,b,c,d,e'];

        $rules["d-1"] = ['required', 'array', 'min:1', 'max:5', 'in:a,b,c,d,e'];
        $rules["d-1.*"] = ['in:a,b,c,d,e'];

        for ($i = 1; $i <= 18; $i++) {
            $rules["e-$i"] = ['required', 'integer', 'between:0,4'];
            $rules["f-$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["g-1"] = ['required', 'string', 'max:255'];
        $rules["i-1"] = ['required', 'string', 'max:255'];
        $rules["j-1"] = ['required', 'string', 'max:255'];

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
        
        $attributes["c-1"] = "c-1"; //C
        $attributes["d-1"] = "d-1"; //D

        for ($i = 1; $i <= 18; $i++) {
            $attributes["e-$i"] = "e-$i";
            $attributes["f-$i"] = "f-$i";
        }

        $attributes["h-1"] = "h-1"; //H
        $attributes["i-1"] = "i-1"; //I
        $attributes["j-1"] = "j-1"; //J

        return $attributes;
    }
}
