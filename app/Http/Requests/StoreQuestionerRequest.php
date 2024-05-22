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
        return false;
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
            $rules["a-$i"] = ['required', 'integer', 'between:0,4'];
            $rules["b-$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["c-1"] = ['required', 'integer', 'between:0,3'];

        for ($i = 1; $i <= 5; $i++) {
            $rules["d-$i"] = ['required', 'integer', 'between:0,4'];
            $rules["e-$i"] = ['required', 'integer', 'between:0,4'];
        }
        for ($i = 1; $i <= 10; $i++) {
            $rules["f-$i"] = ['required', 'integer', 'between:0,4'];
        }
        for ($i = 1; $i <= 6; $i++) {
            $rules["g-$i"] = ['required', 'integer', 'between:0,4'];
        }

        $rules["h-1"] = ['required', 'string'];
        $rules["i-1"] = ['required', 'string'];
        $rules["j-1"] = ['required', 'string'];

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
            $attributes["a-$i"] = "a-$i";
            $attributes["b-$i"] = "b-$i";
        }

        $attributes["c-1"] = "c-1"; //C

        for ($i = 1; $i <= 5; $i++) {
            $attributes["d-$i"] = "d-$i";
            $attributes["e-$i"] = "e-$i";
        }
        for ($i = 1; $i <= 10; $i++) {
            $attributes["f-$i"] = "f-$i";
        }
        for ($i = 1; $i <= 6; $i++) {
            $attributes["g-$i"] = "g-$i";
        }

        $attributes["h-1"] = "h-1"; //H
        $attributes["i-1"] = "i-1"; //I
        $attributes["j-1"] = "j-1"; //J

        return $attributes;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }
}
