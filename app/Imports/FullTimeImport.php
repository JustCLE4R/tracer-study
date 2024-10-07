<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Pekerja;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FullTimeImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
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

        Pekerja::firstOrCreate(
            ['user_id' => $user->id],
            [
                'status_pekerjaan' => $row['status_pekerjaan'],
                'kriteria_pekerjaan' => $row['kriteria_pekerjaan'],
                'bidang_pekerjaan' => $row['bidang_pekerjaan'],
                'tingkat_tempat_bekerja' => $row['tingkat_tempat_bekerja'],
                'jabatan_pekerjaan' => $row['jabatan_pekerjaan'],
                'detail_pekerjaan' => $row['detail_pekerjaan'],
                'pendapatan' => $row['pendapatan'],
                'kesesuaian' => $row['kesesuaian'],
                'tgl_mulai_kerja' => $row['tgl_mulai_kerja'],
                'provinsi_kerja' => $row['provinsi_kerja'],
                'kabupaten_kerja' => $row['kabupaten_kerja'],
                'bukti_bekerja' => $row['bukti_bekerja'],
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
            
            'status_pekerjaan' => 'required|string|max:255',
            'kriteria_pekerjaan' => 'required|string|in:a,b,c,d',
            'bidang_pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'tingkat_tempat_bekerja' => 'required|string|in:a,b,c',
            'jabatan_pekerjaan' => 'required|string|in:a,b,c,d,e,f',
            'detail_pekerjaan' => 'required|string|max:500',
            'pendapatan' => 'required|numeric|min:0',
            'kesesuaian' => 'required|string|max:255',
            'tgl_mulai_kerja' => 'required|date',
            'provinsi_kerja' => 'required|string|max:255',
            'kabupaten_kerja' => 'required|string|max:255',
            'bukti_bekerja' => 'required|string|max:255',
        ];
    }

    // Custom validation messages
    public function customValidationMessages()
    {
        return [
            'nim.required' => 'NIM wajib diisi.',
            'nim.string' => 'NIM harus berupa teks.',
            'nim.max' => 'NIM maksimal 10 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'password.required' => 'Password wajib diisi.',
            'program_studi.required' => 'Program Studi wajib diisi.',
            'program_studi.string' => 'Program Studi harus berupa teks.',
            'program_studi.max' => 'Program Studi maksimal 255 karakter.',
            'fakultas.required' => 'Fakultas wajib diisi.',
            'fakultas.string' => 'Fakultas harus berupa teks.',
            'fakultas.max' => 'Fakultas maksimal 255 karakter.',
            'strata.required' => 'Strata wajib diisi.',
            'strata.string' => 'Strata harus berupa teks.',
            'strata.max' => 'Strata maksimal 10 karakter.',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi.',
            'tahun_masuk.integer' => 'Tahun Masuk harus berupa angka.',
            'tahun_masuk.min' => 'Tahun Masuk minimal 1900.',
            'tahun_masuk.max' => 'Tahun Masuk maksimal tahun ini.',
            'tgl_lulus.required' => 'Tanggal Lulus bermasalah (cek kembali).',
            'tgl_lulus.date' => 'Tanggal Lulus harus berupa tanggal.',
            'tgl_yudisium.required' => 'Tanggal Yudisium bermasalah (cek kembali).',
            'tgl_yudisium.date' => 'Tanggal Yudisium harus berupa tanggal.',
            'tgl_wisuda.required' => 'Tanggal Wisuda bermasalah (cek kembali).',
            'tgl_wisuda.date' => 'Tanggal Wisuda harus berupa tanggal.',
            'ipk.required' => 'IPK wajib diisi.',
            'ipk.numeric' => 'IPK harus berupa angka.',
            'ipk.min' => 'IPK minimal 0.',
            'ipk.max' => 'IPK maksimal 4.',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat Lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 255 karakter.',
            'tgl_lahir.required' => 'Tanggal Lahir bermasalah (cek kembali).',
            'tgl_lahir.date' => 'Tanggal Lahir harus berupa tanggal.',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'jenis_kelamin.string' => 'Jenis Kelamin harus berupa teks.',
            'jenis_kelamin.in' => 'Jenis Kelamin harus L atau P.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'telepon.required' => 'Telepon wajib diisi.',
            'telepon.string' => 'Telepon harus berupa teks.',
            'telepon.max' => 'Telepon maksimal 15 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'status_pekerjaan.required' => 'Status Pekerjaan wajib diisi.',
            'status_pekerjaan.string' => 'Status Pekerjaan harus berupa teks.',
            'status_pekerjaan.max' => 'Status Pekerjaan maksimal 255 karakter.',
            'kriteria_pekerjaan.required' => 'Kriteria Pekerjaan wajib diisi.',
            'kriteria_pekerjaan.string' => 'Kriteria Pekerjaan harus berupa teks.',
            'kriteria_pekerjaan.max' => 'Kriteria Pekerjaan maksimal 255 karakter.',
            'kriteria_pekerjaan.in' => 'Kriteria Pekerjaan harus a, b, c, atau d.',
            'bidang_pekerjaan.required' => 'Bidang Pekerjaan wajib diisi.',
            'bidang_pekerjaan.string' => 'Bidang Pekerjaan harus berupa teks.',
            'bidang_pekerjaan.max' => 'Bidang Pekerjaan maksimal 255 karakter.',
            'bidang_pekerjaan.in' => 'Bidang Pekerjaan harus a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t atau u.',
            'tingkat_tempat_bekerja.required' => 'Tingkat Tempat Bekerja wajib diisi.',
            'tingkat_tempat_bekerja.string' => 'Tingkat Tempat Bekerja harus berupa teks.',
            'tingkat_tempat_bekerja.max' => 'Tingkat Tempat Bekerja maksimal 255 karakter.',
            'tingkat_tempat_bekerja.in' => 'Tingkat Tempat Bekerja harus a, b atau c.',
            'jabatan_pekerjaan.required' => 'Jabatan Pekerjaan wajib diisi.',
            'jabatan_pekerjaan.string' => 'Jabatan Pekerjaan harus berupa teks.',
            'jabatan_pekerjaan.max' => 'Jabatan Pekerjaan maksimal 255 karakter.',
            'jabatan_pekerjaan.in' => 'Jabatan Pekerjaan harus a, b, c, d, e atau f.',
            'detail_pekerjaan.required' => 'Detail Pekerjaan wajib diisi.',
            'detail_pekerjaan.string' => 'Detail Pekerjaan harus berupa teks.',
            'detail_pekerjaan.max' => 'Detail Pekerjaan maksimal 500 karakter.',
            'pendapatan.required' => 'Pendapatan wajib diisi.',
            'pendapatan.numeric' => 'Pendapatan harus berupa angka.',
            'pendapatan.min' => 'Pendapatan minimal 0.',
            'kesesuaian.required' => 'Kesesuaian wajib diisi.',
            'kesesuaian.string' => 'Kesesuaian harus berupa teks.',
            'kesesuaian.max' => 'Kesesuaian maksimal 255 karakter.',
            'tgl_mulai_kerja.required' => 'Tanggal Mulai Kerja wajib diisi.',
            'tgl_mulai_kerja.date' => 'Tanggal Mulai Kerja harus berupa tanggal.',
            'provinsi_kerja.required' => 'Provinsi Kerja wajib diisi.',
            'provinsi_kerja.string' => 'Provinsi Kerja harus berupa teks.',
            'provinsi_kerja.max' => 'Provinsi Kerja maksimal 255 karakter.',
            'kabupaten_kerja.required' => 'Kabupaten Kerja wajib diisi.',
            'kabupaten_kerja.string' => 'Kabupaten Kerja harus berupa teks.',
            'kabupaten_kerja.max' => 'Kabupaten Kerja maksimal 255 karakter.',
            'bukti_bekerja.required' => 'Bukti Bekerja wajib diisi.',
            'bukti_bekerja.string' => 'Bukti Bekerja harus berupa teks.',
            'bukti_bekerja.max' => 'Bukti Bekerja maksimal 255 karakter.',
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
        $row['tgl_mulai_kerja'] = is_numeric($row['tgl_mulai_kerja']) ? Date::excelToDateTimeObject($row['tgl_mulai_kerja'])->format('Y-m-d') : null;

        return $row;
    }
}
