<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Wirausaha;
use App\Models\ApiIntegration;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WirausahaImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::updateOrCreate(
            ['nim' => $row['nim']],
            [
                'nama' => $row['nama'],
                'password' => md5($row['password']),
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

        Wirausaha::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nama_usaha' => $row['nama_usaha'],
                'tingkat_tempat_usaha' => $row['tingkat_tempat_usaha'],
                'bidang_usaha' => $row['bidang_usaha'],
                'detail_usaha' => $row['detail_usaha'],
                'omset' => $row['omset'],
                'pendapatan' => $row['pendapatan'],
                'pemodal' => json_encode($row['pemodal']),
                'kesesuaian' => $row['kesesuaian'],
                'tgl_mulai_usaha' => $row['tgl_mulai_usaha'],
                'provinsi_usaha' => $row['provinsi_usaha'],
                'kabupaten_usaha' => $row['kabupaten_usaha'],
                'alamat_usaha' => $row['alamat_usaha'],
                'bukti_berusaha' => $row['bukti_berusaha'],
            ]
        );
    }


    // Validation rules
    public function rules(): array
    {
        return [
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'password' => 'required',
            'program_studi' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'strata' => 'required|string|max:10',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'),
            'tgl_lulus' => 'required|date',
            'tgl_yudisium' => 'required|date',
            'tgl_wisuda' => 'required|date',
            'ipk' => 'required|min:0|max:4',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',

            'nama_usaha' => 'required|string|max:255',
            'tingkat_tempat_usaha' => 'required|string',
            'bidang_usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'detail_usaha' => 'required|string|max:255',
            'omset' => 'required',
            'pendapatan' => 'required',
            'pemodal' => 'required|array|min:1|max:4|in:a,b,c,d',
            'kesesuaian' => 'required|string|in:a,b,c',
            'tgl_mulai_usaha' => 'required|date',
            'provinsi_usaha' => 'required|string|max:255',
            'kabupaten_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required|string|max:255',
            'bukti_berusaha' => 'required|string|max:255', 
        ];
    }

    // Custom validation messages
    public function customValidationMessages()
    {
        return [
            'nim.required' => 'NIM harus diisi.',
            'nim.string' => 'NIM harus berupa teks.',
            'nim.max' => 'NIM maksimal 10 karakter.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'password.required' => 'Password harus diisi.',
            'program_studi.required' => 'Program Studi harus diisi.',
            'program_studi.string' => 'Program Studi harus berupa teks.',
            'program_studi.max' => 'Program Studi maksimal 255 karakter.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'fakultas.string' => 'Fakultas harus berupa teks.',
            'fakultas.max' => 'Fakultas maksimal 255 karakter.',
            'strata.required' => 'Strata harus diisi.',
            'strata.string' => 'Strata harus berupa teks.',
            'strata.max' => 'Strata maksimal 10 karakter.',
            'tahun_masuk.required' => 'Tahun Masuk harus diisi.',
            'tahun_masuk.integer' => 'Tahun Masuk harus berupa angka.',
            'tahun_masuk.min' => 'Tahun Masuk minimal 1900.',
            'tahun_masuk.max' => 'Tahun Masuk maksimal tahun ini.',
            'tgl_lulus.required' => 'Tanggal Lulus harus diisi.',
            'tgl_lulus.date' => 'Tanggal Lulus harus berupa tanggal yang valid.',
            'tgl_yudisium.required' => 'Tanggal Yudisium harus diisi.',
            'tgl_yudisium.date' => 'Tanggal Yudisium harus berupa tanggal yang valid.',
            'tgl_wisuda.required' => 'Tanggal Wisuda harus diisi.',
            'tgl_wisuda.date' => 'Tanggal Wisuda harus berupa tanggal yang valid.',
            'ipk.required' => 'IPK harus diisi.',
            'ipk.numeric' => 'IPK harus berupa angka.',
            'ipk.min' => 'IPK minimal 0.',
            'ipk.max' => 'IPK maksimal 4.',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi.',
            'tempat_lahir.string' => 'Tempat Lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 255 karakter.',
            'tgl_lahir.required' => 'Tanggal Lahir harus diisi.',
            'tgl_lahir.date' => 'Tanggal Lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
            'jenis_kelamin.string' => 'Jenis Kelamin harus berupa teks.',
            'jenis_kelamin.in' => 'Jenis Kelamin harus berupa L atau P.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.string' => 'Telepon harus berupa teks.',
            'telepon.max' => 'Telepon maksimal 15 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',

            'nama_usaha.required' => 'Nama Usaha harus diisi.',
            'nama_usaha.string' => 'Nama Usaha harus berupa teks.',
            'nama_usaha.max' => 'Nama Usaha maksimal 255 karakter.',
            'tingkat_ukuran_tempat_usaha.required' => 'Tingkat Ukuran Tempat Usaha harus diisi.',
            'tingkat_ukuran_tempat_usaha.string' => 'Tingkat Ukuran Tempat Usaha harus berupa teks.',
            'bidang_usaha.required' => 'Bidang Usaha harus diisi.',
            'bidang_usaha.string' => 'Bidang Usaha harus berupa teks.',
            'bidang_usaha.in' => 'Bidang Usaha harus salah satu dari nilai yang ditentukan.',
            'detail_usaha.required' => 'Detail Usaha harus diisi.',
            'detail_usaha.string' => 'Detail Usaha harus berupa teks.',
            'detail_usaha.max' => 'Detail Usaha maksimal 255 karakter.',
            'jumlah_pendapatan_perbulan_omset_penjualan.required' => 'Jumlah Pendapatan Perbulan Omset Penjualan harus diisi.',
            'jumlah_pendapatan_perbulan_omset_penjualan.numeric' => 'Jumlah Pendapatan Perbulan Omset Penjualan harus berupa angka.',
            'jumlah_pendapatan_bersih_perbulan.required' => 'Jumlah Pendapatan Bersih Perbulan harus diisi.',
            'jumlah_pendapatan_bersih_perbulan.numeric' => 'Jumlah Pendapatan Bersih Perbulan harus berupa angka.',
            'pemodal.required' => 'Pemodal harus diisi.',
            'pemodal.array' => 'Pemodal harus berupa array.',
            'pemodal.min' => 'Pemodal harus memiliki setidaknya satu item.',
            'pemodal.max' => 'Pemodal tidak boleh memiliki lebih dari empat item.',
            'pemodal.in' => 'Pemodal harus salah satu dari nilai yang ditentukan.',
            'kesesuaian_usaha_dengan_prodi.required' => 'Kesesuaian Usaha Dengan Prodi harus diisi.',
            'kesesuaian_usaha_dengan_prodi.string' => 'Kesesuaian Usaha Dengan Prodi harus berupa teks.',
            'kesesuaian_usaha_dengan_prodi.in' => 'Kesesuaian Usaha Dengan Prodi harus salah satu dari nilai yang ditentukan.',
            'tgl_mulai_usaha.required' => 'Tanggal Mulai Usaha harus diisi.',
            'tgl_mulai_usaha.date' => 'Tanggal Mulai Usaha harus berupa tanggal yang valid.',
            'tgl_akhir_usaha_kosongkan_jika_masih_memiliki_usaha.nullable' => 'Tanggal Akhir Usaha bisa kosong jika masih memiliki usaha.',
            'tgl_akhir_usaha_kosongkan_jika_masih_memiliki_usaha.date' => 'Tanggal Akhir Usaha harus berupa tanggal yang valid.',
            'provinsi.required' => 'Provinsi harus diisi.',
            'provinsi.string' => 'Provinsi harus berupa teks.',
            'provinsi.max' => 'Provinsi maksimal 255 karakter.',
            'kabupaten.required' => 'Kabupaten harus diisi.',
            'kabupaten.string' => 'Kabupaten harus berupa teks.',
            'kabupaten.max' => 'Kabupaten maksimal 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'bukti_berusaha.required' => 'Bukti Berusaha harus diisi.',
            'bukti_berusaha.string' => 'Bukti Berusaha harus berupa teks.',
            'bukti_berusaha.max' => 'Bukti Berusaha maksimal 255 karakter.',
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
        $row['tgl_mulai_usaha'] = is_numeric($row['tgl_mulai_usaha']) ? Date::excelToDateTimeObject($row['tgl_mulai_usaha'])->format('Y-m-d') : null;

        $row['pemodal'] = array_map('trim', explode(',', $row['pemodal']));

        return $row;
    }
}
