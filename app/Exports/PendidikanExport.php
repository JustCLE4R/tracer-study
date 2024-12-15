<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendidikanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
        return User::with(['pendidikan', 'certCheck'])
        ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
        ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
        ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
        ->whereHas('certCheck', function ($query) {
            $query->where('profile_check', true)
            ->where('perjalanan_karir_check', true)
            ->where('questioner_check', true);
        })
        ->whereHas('pendidikan', function ($query) {
            $query->where('is_studying', true);
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

            'Tingkat Pendidikan',
            'Program Studi',
            'Perguruan Tinggi',
            'Tanggal Surat Penerimaan Pendidikan',
            'Tanggal Mulai Pendidikan',
            'Sedang Studi',
            'Satu Linear',
            'Negara Pendidikan',
            'Provinsi Pendidikan',
            'Kabupaten Pendidikan',
            'Alamat Pendidikan',
            'Bukti Pendidikan',
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
            $user->telepon
            ,$user->email,
            $user->linkedin,
            $user->facebook,
            $user->masa_studi_semester,
            $user->lama_mendapatkan_pekerjaan,

            $user->pendidikan->first()->tingkat_pendidikan,
            $user->pendidikan->first()->program_studi,
            $user->pendidikan->first()->perguruan_tinggi,
            $user->pendidikan->first()->tgl_surat_penerimaan_pendidikan,
            $user->pendidikan->first()->tgl_mulai_pendidikan,
            $user->pendidikan->first()->is_studying,
            $user->pendidikan->first()->is_linear,
            $user->pendidikan->first()->negara_pendidikan,
            $user->pendidikan->first()->provinsi_pendidikan,
            $user->pendidikan->first()->kabupaten_pendidikan,
            $user->pendidikan->first()->alamat_pendidikan,
            env('APP_URL') . '/storage/' . $user->pendidikan->first()->bukti_pendidikan,
        ];
    }
}
