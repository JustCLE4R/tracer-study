<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
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
            'old_password' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (!Hash::check(md5($value), auth()->user()->password)) {
                    $fail('Password lama tidak sesuai.');
                }
            }],
            'password' => 'required|string|max:255|same:confirm_password',
            'confirm_password' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'same' => 'Kolom :attribute tidak sama dengan kolom konfirmasi password.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'password lama',
            'password' => 'password baru',
            'password_confirmation' => 'konfirmasi password baru',
        ];
    }
}
