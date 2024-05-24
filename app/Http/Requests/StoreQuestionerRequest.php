<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreQuestionerRequest extends FormRequest
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
        $rules['user_id'] = ['required'];
        
        for ($i = 1; $i <= 18; $i++) {
            $rules["a_$i"] = ['required', 'integer', 'between:0,4'];
            $rules["b_$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["c_1"] = ['required', 'integer', 'between:0,3'];

        for ($i = 1; $i <= 5; $i++) {
            $rules["d_$i"] = ['required', 'integer', 'between:0,4'];
            $rules["e_$i"] = ['required', 'integer', 'between:0,4'];
        }
        for ($i = 1; $i <= 10; $i++) {
            $rules["f_$i"] = ['required', 'integer', 'between:0,4'];
        }
        for ($i = 1; $i <= 6; $i++) {
            $rules["g_$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["h_1"] = ['required', 'string'];
        $rules["i_1"] = ['required', 'string'];
        $rules["j_1"] = ['required', 'string'];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute harus diisi',
            'between' => 'Kolom :attribute harus berisi angka antara :min sampai :max',
            'integer' => 'Kolom :attribute harus berupa angka',
            'string' => 'Kolom :attribute harus berupa teks',
        ];
    }

    public function attributes(): array
    {
        $attributes = [];
        for ($i = 1; $i <= 18; $i++) {
            $attributes["a_$i"] = "a_$i";
            $attributes["b_$i"] = "b_$i";
        }

        $attributes["c_1"] = "c_1"; //C

        for ($i = 1; $i <= 5; $i++) {
            $attributes["d_$i"] = "d_$i";
            $attributes["e_$i"] = "e_$i";
        }
        for ($i = 1; $i <= 10; $i++) {
            $attributes["f_$i"] = "f_$i";
        }
        for ($i = 1; $i <= 6; $i++) {
            $attributes["g_$i"] = "g_$i";
        }

        $attributes["h_1"] = "h_1"; //H
        $attributes["i_1"] = "i_1"; //I
        $attributes["j_1"] = "j_1"; //J

        return $attributes;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }
}
