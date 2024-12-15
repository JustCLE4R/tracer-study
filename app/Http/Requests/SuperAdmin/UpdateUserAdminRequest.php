<?php
namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAdminRequest extends FormRequest
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
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'role' => 'required|string|in:mahasiswa,surveyor,adminprodi,adminfakultas,superadmin,superadmin2',
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'exclude_if:role,adminfakultas|required|string|max:255',
            'password' => 'nullable|string|min:8',
            'password_confirmation' => 'nullable|string|min:8|same:password',

        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'in' => 'Kolom :attribute tidak valid.',
            'same' => 'Kolom :attribute harus sama dengan kolom :other.',
            'string' => 'Kolom :attribute harus berupa string.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nim' => 'Username',
            'nama' => 'Nama',
            'role' => 'Role',
            'fakultas' => 'Fakultas',
            'program_studi' => 'Program Studi',
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
        ];
    }
}
