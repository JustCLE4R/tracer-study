<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WirausahaExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $tahun;
    protected $fakultas;
    protected $programStudi;

    public function __construct($tahun, $fakultas, $programStudi)
    {
        $this->tahun = $tahun;
        $this->fakultas = $fakultas;
        $this->programStudi = $programStudi;
    }

    public function collection()
    {
        return User::with(['wirausaha', 'certCheck'])
        ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
        ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
        ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
        ->whereHas('certCheck', function ($query) {
            $query->where('profile_check', true)
            ->where('perjalanan_karir_check', true)
            ->where('questioner_check', true);
        })
        ->whereHas('wirausaha', function ($query) {
            $query->where('is_active', true)
                ->whereNull('tgl_akhir_usaha')
                ->orWhere('tgl_akhir_usaha', function ($subQuery) {
                    $subQuery->selectRaw('MIN(tgl_akhir_usaha)')
                        ->from('wirausahas')
                        ->whereColumn('user_id', 'users.id');
                });
        })
        ->get();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Role',
            'Is Bekerja',
            'Program Studi',
            'Fakultas',
            'Strata',
            'Tahun Masuk',
            'Tanggal Lulus',
            'Tanggal Wisuda',
            'Tanggal Yudisium',
            'IPK',
            'SKS Kumulatif',
            'Predikat Kelulusan',
            'Judul Tugas Akhir',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Kewarganegaraan',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Alamat',
            'Telepon',
            'Email',
            'LinkedIn',
            'Facebook',
            'Lama Studi (Semester)',
            'Masa Tunggu Mendapatkan Pekerjaan (Hari)',

            "Sedang Berwirausaha",
            "Nama Usaha",
            "Tingkat Tempat Usaha",
            "Bidang Usaha",
            "Detail Usaha",
            "Omset",
            "Pendapatan",
            "Pemodal",
            "Kesesuaian",
            "Tanggal Mulai Usaha",
            "Tanggal Akhir Usaha",
            "Provinsi Usaha",
            "Kabupaten Usaha",
            "Alamat Usaha",
            "Bukti Berwirausaha",
        ];
    }

    public function map($user): array
    {
        return [
            $user->nim,
            $user->nama,
            $user->role,
            $user->is_bekerja,
            $user->program_studi,
            $user->fakultas,
            $user->strata,
            $user->tahun_masuk,
            $user->tgl_lulus,
            $user->tgl_wisuda,
            $user->tgl_yudisium,
            $user->ipk,
            $user->sks_kumulatif,
            $user->predikat_kelulusan,
            $user->judul_tugas_akhir,
            $user->tempat_lahir,
            $user->tgl_lahir,
            $user->jenis_kelamin,
            $user->kewarganegaraan,
            $user->provinsi,
            $user->kabupaten,
            $user->kecamatan,
            $user->alamat,
            $user->telepon,
            $user->email,
            $user->linkedin,
            $user->facebook,
            $user->masa_studi_semester,
            $user->lama_mendapatkan_pekerjaan,

            $user->wirausaha->first()->is_active,
            $user->wirausaha->first()->nama_usaha,
            $user->wirausaha->first()->tingkat_tempat_usaha,
            $user->wirausaha->first()->bidang_usaha,
            $user->wirausaha->first()->detail_usaha,
            $user->wirausaha->first()->omset,
            $user->wirausaha->first()->pendapatan,
            $user->wirausaha->first()->pemodal,
            $user->wirausaha->first()->kesesuaian,
            $user->wirausaha->first()->tgl_mulai_usaha,
            $user->wirausaha->first()->tgl_akhir_usaha,
            $user->wirausaha->first()->provinsi_usaha,
            $user->wirausaha->first()->kabupaten_usaha,
            $user->wirausaha->first()->alamat_usaha,
            env('APP_URL') . '/storage/' . $user->wirausaha->first()->bukti_berusaha,
        ];
    }
}
