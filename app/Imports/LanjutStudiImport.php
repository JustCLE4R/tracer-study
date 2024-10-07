<?php

namespace App\Imports;

use App\Models\Pendidikan;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class LanjutStudiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::firstOrCreate(
            ['nim' => $row['nim']],
            [
                'nama' => $row['nama'],
                'password' => $row['password'],
                'program_studi' => $row['program_studi'],
                'fakultas' => $row['fakultas'],
                'strata' => $row['strata'],
                'tahun_masuk' => $row['tahun_masuk'],
                'tgl_lulus' => $row['tgl_lulus'],
                'tgl_yudisium' => $row['tgl_yudisium'],
                'tgl_wisuda' => $row['tgl_wisuda'],
                'ipk' => $row['ipk'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tgl_lahir' => $row['tgl_lahir'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'alamat' => $row['alamat'],
                'telepon' => $row['telepon'],
                'email' => $row['email'],
            ]
        );

        Pendidikan::firstOrCreate(
            ['user_id' => $user->id],
            [
                'tingkat_pendidikan' => $row['tingkat_pendidikan'],
                'program_studi' => $row['program_studi'],
                'perguruan_tinggi' => $row['perguruan_tinggi'],
                'tgl_surat_penerimaan_pendidikan' => $row['tgl_surat_penerimaan_pendidikan'],
                'tgl_mulai_pendidikan' => $row['tgl_mulai_pendidikan'],
                'is_studying' => $row['is_studying'],
                'is_linear' => $row['is_linear'],
                'negara_pendidikan' => $row['negara_pendidikan'],
                'provinsi_pendidikan' => $row['provinsi_pendidikan'],
                'kabupaten_pendidikan' => $row['kabupaten_pendidikan'],
                'alamat_pendidikan' => $row['alamat_pendidikan'],
                'bukti_pendidikan' => $row['bukti_pendidikan'],
            ]
        );
    }


    // Validation rules
    public function rules(): array
    {
        return [
            'nim' => 'required|string|max:10',
            'nama' => 'required|string|max:255',
            'password' => 'required',
            'program_studi' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'strata' => 'required|string|max:10',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'),
            'tgl_lulus' => 'required|date',
            'tgl_yudisium' => 'required|date',
            'tgl_wisuda' => 'required|date',
            'ipk' => 'required|numeric|min:0|max:4',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',

            'tingkat_pendidikan' => 'required|in:a,b,c',
            'program_studi' => 'required',
            'perguruan_tinggi' => 'required',
            'tgl_surat_penerimaan_pendidikan' => 'required|date',
            'tgl_mulai_pendidikan' => 'required|date',
            'is_studying' => 'required|in:0,1,2',
            'is_linear' => 'required|in:0,1',
            'negara_pendidikan' => 'required',
            'provinsi_pendidikan' => 'required_if:negara_pendidikan,Indonesia',
            'kabupaten_pendidikan' => 'required_if:negara_pendidikan,Indonesia',
            'alamat_pendidikan' => 'required',
            'bukti_pendidikan' => 'required|string|max:255',
        ];
    }

    // Custom validation messages
    public function customValidationMessages()
    {
        return [
            'nim.required' => 'NIM wajib diisi.',
            'nim.string' => 'NIM harus berupa string.',
            'nim.max' => 'NIM tidak boleh lebih dari 10 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Password wajib diisi.',
            'program_studi.required' => 'Program Studi wajib diisi.',
            'program_studi.string' => 'Program Studi harus berupa string.',
            'program_studi.max' => 'Program Studi tidak boleh lebih dari 255 karakter.',
            'fakultas.required' => 'Fakultas wajib diisi.',
            'fakultas.string' => 'Fakultas harus berupa string.',
            'fakultas.max' => 'Fakultas tidak boleh lebih dari 255 karakter.',
            'strata.required' => 'Strata wajib diisi.',
            'strata.string' => 'Strata harus berupa string.',
            'strata.max' => 'Strata tidak boleh lebih dari 10 karakter.',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi.',
            'tahun_masuk.integer' => 'Tahun Masuk harus berupa angka.',
            'tahun_masuk.min' => 'Tahun Masuk minimal tahun 1900.',
            'tahun_masuk.max' => 'Tahun Masuk tidak boleh lebih dari tahun saat ini.',
            'tgl_lulus.required' => 'Tanggal Lulus wajib diisi.',
            'tgl_lulus.date' => 'Tanggal Lulus harus berupa tanggal yang valid.',
            'tgl_yudisium.required' => 'Tanggal Yudisium wajib diisi.',
            'tgl_yudisium.date' => 'Tanggal Yudisium harus berupa tanggal yang valid.',
            'tgl_wisuda.required' => 'Tanggal Wisuda wajib diisi.',
            'tgl_wisuda.date' => 'Tanggal Wisuda harus berupa tanggal yang valid.',
            'ipk.required' => 'IPK wajib diisi.',
            'ipk.numeric' => 'IPK harus berupa angka.',
            'ipk.min' => 'IPK minimal 0.',
            'ipk.max' => 'IPK maksimal 4.',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat Lahir harus berupa string.',
            'tempat_lahir.max' => 'Tempat Lahir tidak boleh lebih dari 255 karakter.',
            'tgl_lahir.required' => 'Tanggal Lahir wajib diisi.',
            'tgl_lahir.date' => 'Tanggal Lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'jenis_kelamin.string' => 'Jenis Kelamin harus berupa string.',
            'jenis_kelamin.in' => 'Jenis Kelamin harus berupa L atau P.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
            'telepon.required' => 'Telepon wajib diisi.',
            'telepon.string' => 'Telepon harus berupa string.',
            'telepon.max' => 'Telepon tidak boleh lebih dari 15 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

            'tingkat_pendidikan.required' => 'Tingkat Pendidikan wajib diisi.',
            'tingkat_pendidikan.in' => 'Tingkat Pendidikan harus salah satu dari nilai berikut: a, b, c.',
            'program_studi.required' => 'Program Studi wajib diisi.',
            'perguruan_tinggi.required' => 'Perguruan Tinggi wajib diisi.',
            'tgl_surat_penerimaan_pendidikan.required' => 'Tanggal Surat Penerimaan Pendidikan wajib diisi.',
            'tgl_surat_penerimaan_pendidikan.date' => 'Tanggal Surat Penerimaan Pendidikan harus berupa tanggal yang valid.',
            'tgl_mulai_pendidikan.required' => 'Tanggal Mulai Pendidikan wajib diisi.',
            'tgl_mulai_pendidikan.date' => 'Tanggal Mulai Pendidikan harus berupa tanggal yang valid.',
            'is_studying.required' => 'Status Studi wajib diisi.',
            'is_studying.in' => 'Status Studi harus salah satu dari nilai berikut: 0, 1, 2.',
            'is_linear.required' => 'Status Linear wajib diisi.',
            'is_linear.in' => 'Status Linear harus salah satu dari nilai berikut: 0, 1.',
            'negara_pendidikan.required' => 'Negara Pendidikan wajib diisi.',
            'provinsi_pendidikan.required_if' => 'Provinsi Pendidikan wajib diisi jika Negara Pendidikan adalah Indonesia.',
            'kabupaten_pendidikan.required_if' => 'Kabupaten Pendidikan wajib diisi jika Negara Pendidikan adalah Indonesia.',
            'alamat_pendidikan.required' => 'Alamat Pendidikan wajib diisi.',
            'bukti_pendidikan.required' => 'Bukti Pendidikan wajib diisi.',
            'bukti_pendidikan.string' => 'Bukti Pendidikan harus berupa string.',
            'bukti_pendidikan.max' => 'Bukti Pendidikan tidak boleh lebih dari 255 karakter.',
        ];
    }

    public function prepareForValidation($row)
    {
        // Trim all fields
        $row = array_map('trim', $row);

        // Convert dates only if they are numeric Excel date values
        $row['tgl_lulus'] = is_numeric($row['tgl_lulus']) ? Date::excelToDateTimeObject($row['tgl_lulus'])->format('Y-m-d') : null;
        $row['tgl_yudisium'] = is_numeric($row['tgl_yudisium']) ? Date::excelToDateTimeObject($row['tgl_yudisium'])->format('Y-m-d') : null;
        $row['tgl_wisuda'] = is_numeric($row['tgl_wisuda']) ? Date::excelToDateTimeObject($row['tgl_wisuda'])->format('Y-m-d') : null;
        $row['tgl_lahir'] = is_numeric($row['tgl_lahir']) ? Date::excelToDateTimeObject($row['tgl_lahir'])->format('Y-m-d') : null;
        $row['tgl_surat_penerimaan_pendidikan'] = is_numeric($row['tgl_surat_penerimaan_pendidikan']) ? Date::excelToDateTimeObject($row['tgl_surat_penerimaan_pendidikan'])->format('Y-m-d') : null;
        $row['tgl_mulai_pendidikan'] = is_numeric($row['tgl_mulai_pendidikan']) ? Date::excelToDateTimeObject($row['tgl_mulai_pendidikan'])->format('Y-m-d') : null;

        return $row;
    }
}


