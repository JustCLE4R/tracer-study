<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PekerjaExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
        return User::with(['pekerja', 'certCheck'])
        ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
        ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
        ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
        ->whereHas('certCheck', function ($query) {
            $query->where('profile_check', true)
            ->where('perjalanan_karir_check', true)
            ->where('questioner_check', true);
        })
        ->whereHas('pekerja', function ($query) {
            $query->where('is_active', true)
                ->where(function ($query) {
                    $query->whereNull('tgl_akhir_kerja')
                        ->orWhere('tgl_akhir_kerja', function ($subQuery) {
                            $subQuery->selectRaw('MIN(tgl_akhir_kerja)')
                                    ->from('pekerjas')
                                    ->whereColumn('user_id', 'users.id');
                        });
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
            'Tanggal Wisuda','Tanggal Yudisium',
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

            "Sedang Bekerja",
            "Status Pekerjaan",
            "Kriteria Pekerjaan",
            "Bidang Pekerjaan",
            "Tingkat Ukuran Tempat Bekerja",
            "Jabatan Pekerjaan",
            "Detail Pekerjaan",
            "Pendapatan",
            "Kesesuaian Pekerjaan dengan Program Studi",
            "Tanggal Mulai Bekerja",
            "Tanggal Akhir Bekerja",
            "Provinsi Kerja",
            "Kabupaten Kerja",
            "Bukti Kerja",
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
            $user->tgl_wisuda,
            $user->tgl_yudisium,
            $user->ipk,
            $user->sks_kumulatif,$user->predikat_kelulusan,
            $user->judul_tugas_akhir,
            $user->tempat_lahir,
            $user->tgl_lahir,
            $user->jenis_kelamin,
            $user->kewarganegaraan,
            $user->provinsi,
            $user->kabupaten,
            $user->kecamatan,
            $user->alamat,
            $user->telepon,$user->email,
            $user->linkedin,
            $user->facebook,

            $user->pekerja->first()->is_active,
            $user->pekerja->first()->status_pekerjaan,
            $user->pekerja->first()->kriteria_pekerjaan,
            $user->pekerja->first()->bidang_pekerjaan,
            $user->pekerja->first()->tingkat_tempat_bekerja,
            $user->pekerja->first()->jabatan_pekerjaan,
            $user->pekerja->first()->detail_pekerjaan,
            $user->pekerja->first()->pendapatan,
            $user->pekerja->first()->kesesuaian,
            $user->pekerja->first()->tgl_mulai_kerja,
            $user->pekerja->first()->tgl_akhir_kerja,
            $user->pekerja->first()->provinsi_kerja,
            $user->pekerja->first()->kabupaten_kerja,
            env('APP_URL') . '/storage/' . $user->pekerja->first()->bukti_bekerja,
        ];
    }
}
