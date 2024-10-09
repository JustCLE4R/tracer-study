<?php

namespace App\Imports;

use App\Models\QuestionerStakeHolder;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StkQuestionerImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return QuestionerStakeHolder::updateOrCreate(
            ['detail_perusahaan_id' => $row['detail_perusahaan_id']],
            [
                'c_1' => json_encode($row['c_1']),
                'd_1' => json_encode($row['d_1']),
                'e_1' => $row['e_1'],
                'e_2' => $row['e_2'],
                'e_3' => $row['e_3'],
                'e_4' => $row['e_4'],
                'e_5' => $row['e_5'],
                'e_6' => $row['e_6'],
                'e_7' => $row['e_7'],
                'e_8' => $row['e_8'],
                'e_9' => $row['e_9'],
                'e_10' => $row['e_10'],
                'e_11' => $row['e_11'],
                'e_12' => $row['e_12'],
                'e_13' => $row['e_13'],
                'e_14' => $row['e_14'],
                'e_15' => $row['e_15'],
                'e_16' => $row['e_16'],
                'e_17' => $row['e_17'],
                'e_18' => $row['e_18'],
                'f_1' => $row['f_1'],
                'f_2' => $row['f_2'],
                'f_3' => $row['f_3'],
                'f_4' => $row['f_4'],
                'f_5' => $row['f_5'],
                'f_6' => $row['f_6'],
                'f_7' => $row['f_7'],
                'f_8' => $row['f_8'],
                'f_9' => $row['f_9'],
                'f_10' => $row['f_10'],
                'f_11' => $row['f_11'],
                'f_12' => $row['f_12'],
                'f_13' => $row['f_13'],
                'f_14' => $row['f_14'],
                'f_15' => $row['f_15'],
                'f_16' => $row['f_16'],
                'f_17' => $row['f_17'],
                'f_18' => $row['f_18'],
                'g_1' => $row['g_1'],
                'i_1' => $row['i_1'],
                'j_1' => $row['j_1'],
            ]
        );
    }

    public function rules(): array
    {
        return [
            'nim' => 'required|exists:users,nim',
            '*.c_1' => 'required|array|min:1|max:5|in:a,b,c,d,e',
            '*.d_1' => 'required|array|min:1|max:5|in:a,b,c,d,e',
            '*.e_1' => 'required|in:0,1,2,3,4|integer',
            '*.e_2' => 'required|in:0,1,2,3,4|integer',
            '*.e_3' => 'required|in:0,1,2,3,4|integer',
            '*.e_4' => 'required|in:0,1,2,3,4|integer',
            '*.e_5' => 'required|in:0,1,2,3,4|integer',
            '*.e_6' => 'required|in:0,1,2,3,4|integer',
            '*.e_7' => 'required|in:0,1,2,3,4|integer',
            '*.e_8' => 'required|in:0,1,2,3,4|integer',
            '*.e_9' => 'required|in:0,1,2,3,4|integer',
            '*.e_10' => 'required|in:0,1,2,3,4|integer',
            '*.e_11' => 'required|in:0,1,2,3,4|integer',
            '*.e_12' => 'required|in:0,1,2,3,4|integer',
            '*.e_13' => 'required|in:0,1,2,3,4|integer',
            '*.e_14' => 'required|in:0,1,2,3,4|integer',
            '*.e_15' => 'required|in:0,1,2,3,4|integer',
            '*.e_16' => 'required|in:0,1,2,3,4|integer',
            '*.e_17' => 'required|in:0,1,2,3,4|integer',
            '*.e_18' => 'required|in:0,1,2,3,4|integer',
            '*.f_1' => 'required|in:0,1,2,3,4|integer',
            '*.f_2' => 'required|in:0,1,2,3,4|integer',
            '*.f_3' => 'required|in:0,1,2,3,4|integer',
            '*.f_4' => 'required|in:0,1,2,3,4|integer',
            '*.f_5' => 'required|in:0,1,2,3,4|integer',
            '*.f_6' => 'required|in:0,1,2,3,4|integer',
            '*.f_7' => 'required|in:0,1,2,3,4|integer',
            '*.f_8' => 'required|in:0,1,2,3,4|integer',
            '*.f_9' => 'required|in:0,1,2,3,4|integer',
            '*.f_10' => 'required|in:0,1,2,3,4|integer',
            '*.f_11' => 'required|in:0,1,2,3,4|integer',
            '*.f_12' => 'required|in:0,1,2,3,4|integer',
            '*.f_13' => 'required|in:0,1,2,3,4|integer',
            '*.f_14' => 'required|in:0,1,2,3,4|integer',
            '*.f_15' => 'required|in:0,1,2,3,4|integer',
            '*.f_16' => 'required|in:0,1,2,3,4|integer',
            '*.f_17' => 'required|in:0,1,2,3,4|integer',
            '*.f_18' => 'required|in:0,1,2,3,4|integer',
            '*.g_1' => 'required|string|max:255',
            '*.i_1' => 'required|string|max:255',
            '*.j_1' => 'required|string|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.c_1.required' => 'Kolom c_1 wajib diisi.',
            '*.c_1.array' => 'Kolom c_1 harus berupa array.',
            '*.c_1.min' => 'Kolom c_1 harus memiliki minimal 1 item.',
            '*.c_1.max' => 'Kolom c_1 tidak boleh lebih dari 5 item.',
            '*.c_1.in' => 'Kolom c_1 harus berisi salah satu dari: a, b, c, d, e.',
            '*.d_1.required' => 'Kolom d_1 wajib diisi.',
            '*.d_1.array' => 'Kolom d_1 harus berupa array.',
            '*.d_1.min' => 'Kolom d_1 harus memiliki minimal 1 item.',
            '*.d_1.max' => 'Kolom d_1 tidak boleh lebih dari 5 item.',
            '*.d_1.in' => 'Kolom d_1 harus berisi salah satu dari: a, b, c, d, e.',
            '*.e_1.required' => 'Kolom e_1 wajib diisi.',
            '*.e_1.in' => 'Kolom e_1 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_1.integer' => 'Kolom e_1 harus berupa angka.',
            '*.e_2.required' => 'Kolom e_2 wajib diisi.',
            '*.e_2.in' => 'Kolom e_2 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_2.integer' => 'Kolom e_2 harus berupa angka.',
            '*.e_3.required' => 'Kolom e_3 wajib diisi.',
            '*.e_3.in' => 'Kolom e_3 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_3.integer' => 'Kolom e_3 harus berupa angka.',
            '*.e_4.required' => 'Kolom e_4 wajib diisi.',
            '*.e_4.in' => 'Kolom e_4 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_4.integer' => 'Kolom e_4 harus berupa angka.',
            '*.e_5.required' => 'Kolom e_5 wajib diisi.',
            '*.e_5.in' => 'Kolom e_5 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_5.integer' => 'Kolom e_5 harus berupa angka.',
            '*.e_6.required' => 'Kolom e_6 wajib diisi.',
            '*.e_6.in' => 'Kolom e_6 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_6.integer' => 'Kolom e_6 harus berupa angka.',
            '*.e_7.required' => 'Kolom e_7 wajib diisi.',
            '*.e_7.in' => 'Kolom e_7 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_7.integer' => 'Kolom e_7 harus berupa angka.',
            '*.e_8.required' => 'Kolom e_8 wajib diisi.',
            '*.e_8.in' => 'Kolom e_8 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_8.integer' => 'Kolom e_8 harus berupa angka.',
            '*.e_9.required' => 'Kolom e_9 wajib diisi.',
            '*.e_9.in' => 'Kolom e_9 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_9.integer' => 'Kolom e_9 harus berupa angka.',
            '*.e_10.required' => 'Kolom e_10 wajib diisi.',
            '*.e_10.in' => 'Kolom e_10 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_10.integer' => 'Kolom e_10 harus berupa angka.',
            '*.e_11.required' => 'Kolom e_11 wajib diisi.',
            '*.e_11.in' => 'Kolom e_11 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_11.integer' => 'Kolom e_11 harus berupa angka.',
            '*.e_12.required' => 'Kolom e_12 wajib diisi.',
            '*.e_12.in' => 'Kolom e_12 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_12.integer' => 'Kolom e_12 harus berupa angka.',
            '*.e_13.required' => 'Kolom e_13 wajib diisi.',
            '*.e_13.in' => 'Kolom e_13 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_13.integer' => 'Kolom e_13 harus berupa angka.',
            '*.e_14.required' => 'Kolom e_14 wajib diisi.',
            '*.e_14.in' => 'Kolom e_14 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_14.integer' => 'Kolom e_14 harus berupa angka.',
            '*.e_15.required' => 'Kolom e_15 wajib diisi.',
            '*.e_15.in' => 'Kolom e_15 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_15.integer' => 'Kolom e_15 harus berupa angka.',
            '*.e_16.required' => 'Kolom e_16 wajib diisi.',
            '*.e_16.in' => 'Kolom e_16 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_16.integer' => 'Kolom e_16 harus berupa angka.',
            '*.e_17.required' => 'Kolom e_17 wajib diisi.',
            '*.e_17.in' => 'Kolom e_17 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_17.integer' => 'Kolom e_17 harus berupa angka.',
            '*.e_18.required' => 'Kolom e_18 wajib diisi.',
            '*.e_18.in' => 'Kolom e_18 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.e_18.integer' => 'Kolom e_18 harus berupa angka.',
            '*.f_1.required' => 'Kolom f_1 wajib diisi.',
            '*.f_1.in' => 'Kolom f_1 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_1.integer' => 'Kolom f_1 harus berupa angka.',
            '*.f_2.required' => 'Kolom f_2 wajib diisi.',
            '*.f_2.in' => 'Kolom f_2 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_2.integer' => 'Kolom f_2 harus berupa angka.',
            '*.f_3.required' => 'Kolom f_3 wajib diisi.',
            '*.f_3.in' => 'Kolom f_3 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_3.integer' => 'Kolom f_3 harus berupa angka.',
            '*.f_4.required' => 'Kolom f_4 wajib diisi.',
            '*.f_4.in' => 'Kolom f_4 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_4.integer' => 'Kolom f_4 harus berupa angka.',
            '*.f_5.required' => 'Kolom f_5 wajib diisi.',
            '*.f_5.in' => 'Kolom f_5 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_5.integer' => 'Kolom f_5 harus berupa angka.',
            '*.f_6.required' => 'Kolom f_6 wajib diisi.',
            '*.f_6.in' => 'Kolom f_6 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_6.integer' => 'Kolom f_6 harus berupa angka.',
            '*.f_7.required' => 'Kolom f_7 wajib diisi.',
            '*.f_7.in' => 'Kolom f_7 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_7.integer' => 'Kolom f_7 harus berupa angka.',
            '*.f_8.required' => 'Kolom f_8 wajib diisi.',
            '*.f_8.in' => 'Kolom f_8 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_8.integer' => 'Kolom f_8 harus berupa angka.',
            '*.f_9.required' => 'Kolom f_9 wajib diisi.',
            '*.f_9.in' => 'Kolom f_9 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_9.integer' => 'Kolom f_9 harus berupa angka.',
            '*.f_10.required' => 'Kolom f_10 wajib diisi.',
            '*.f_10.in' => 'Kolom f_10 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_10.integer' => 'Kolom f_10 harus berupa angka.',
            '*.f_11.required' => 'Kolom f_11 wajib diisi.',
            '*.f_11.in' => 'Kolom f_11 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_11.integer' => 'Kolom f_11 harus berupa angka.',
            '*.f_12.required' => 'Kolom f_12 wajib diisi.',
            '*.f_12.in' => 'Kolom f_12 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_12.integer' => 'Kolom f_12 harus berupa angka.',
            '*.f_13.required' => 'Kolom f_13 wajib diisi.',
            '*.f_13.in' => 'Kolom f_13 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_13.integer' => 'Kolom f_13 harus berupa angka.',
            '*.f_14.required' => 'Kolom f_14 wajib diisi.',
            '*.f_14.in' => 'Kolom f_14 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_14.integer' => 'Kolom f_14 harus berupa angka.',
            '*.f_15.required' => 'Kolom f_15 wajib diisi.',
            '*.f_15.in' => 'Kolom f_15 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_15.integer' => 'Kolom f_15 harus berupa angka.',
            '*.f_16.required' => 'Kolom f_16 wajib diisi.',
            '*.f_16.in' => 'Kolom f_16 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_16.integer' => 'Kolom f_16 harus berupa angka.',
            '*.f_17.required' => 'Kolom f_17 wajib diisi.',
            '*.f_17.in' => 'Kolom f_17 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_17.integer' => 'Kolom f_17 harus berupa angka.',
            '*.f_18.required' => 'Kolom f_18 wajib diisi.',
            '*.f_18.in' => 'Kolom f_18 harus berisi salah satu dari: 0, 1, 2, 3, 4.',
            '*.f_18.integer' => 'Kolom f_18 harus berupa angka.',
            '*.g_1.required' => 'Kolom g_1 wajib diisi.',
            '*.g_1.string' => 'Kolom g_1 harus berupa string.',
            '*.g_1.max' => 'Kolom g_1 tidak boleh lebih dari 255 karakter.',
            '*.i_1.required' => 'Kolom i_1 wajib diisi.',
            '*.i_1.string' => 'Kolom i_1 harus berupa string.',
            '*.i_1.max' => 'Kolom i_1 tidak boleh lebih dari 255 karakter.',
            '*.j_1.required' => 'Kolom j_1 wajib diisi.',
            '*.j_1.string' => 'Kolom j_1 harus berupa string.',
            '*.j_1.max' => 'Kolom j_1 tidak boleh lebih dari 255 karakter.',
        ];
    }

    public function prepareForValidation($row)
    {
        // Trim all fields
        $row = array_map('trim', $row);

        // fetch and get user id from the nim at $row['nim']
        $user = User::where('nim', $row['nim'])->first();
        if ($user) {
            $row['detail_perusahaan_id'] = $user->pekerja->first()->detailPerusahaan->id;
        }

        $row['c_1'] = array_map('trim', explode(',', $row['c_1']));
        $row['d_1'] = array_map('trim', explode(',', $row['d_1']));

        return $row;
    }
}
