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
        return User::with(['pekerja' => function($query) {
            $query->where('is_active', 1);
        }])
        ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
        ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
        ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
        ->whereHas('certCheck', fn($query) => $query->where([
            ['profile_check', true],
            ['perjalanan_karir_check', true],
            ['questioner_check', true],
        ]))
        ->whereHas('pekerja', fn($query) => $query->where('is_active', 1))
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
        $pekerja = $user->pekerja->first();

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

            $pekerja->is_active,
            $pekerja->status_pekerjaan,
            $pekerja->kriteria_pekerjaan,
            $pekerja->bidang_pekerjaan,
            $pekerja->tingkat_tempat_bekerja,
            $pekerja->jabatan_pekerjaan,
            $pekerja->detail_pekerjaan,
            $pekerja->pendapatan,
            $pekerja->kesesuaian,
            $pekerja->tgl_mulai_kerja,
            $pekerja->tgl_akhir_kerja,
            $pekerja->provinsi_kerja,
            $pekerja->kabupaten_kerja,
            env('APP_URL') . '/storage/' . $pekerja->bukti_bekerja,
        ];
    }
}
