<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tahun;
    protected $fakultas;
    protected $programStudi;
    protected $jenisVisualisasi;

    public function __construct($tahun, $fakultas, $programStudi, $jenisVisualisasi)
    {
        $this->tahun = $tahun;
        $this->fakultas = $fakultas;
        $this->programStudi = $programStudi;
        $this->jenisVisualisasi = $jenisVisualisasi;
    }

    public function collection()
    {
        return User::with($this->jenisVisualisasi)
            ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
            ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
            ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
            ->whereHas($this->jenisVisualisasi)
            ->get();
    }

    public function headings(): array
    {
        return [
            'NIM', 'Nama', 'Role', 'Is Bekerja', 'Program Studi', 'Fakultas', 'Strata', 'Tahun Masuk', 'Tanggal Wisuda','Tanggal Yudisium', 'IPK', 'SKS Kumulatif', 'Predikat Kelulusan', 'Judul Tugas Akhir', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Kewarganegaraan', 'Provinsi', 'Kabupaten', 'Kecamatan', 'Alamat', 'Telepon', 'Email', 'LinkedIn', 'Facebook'
        ];
    }

    public function map($user): array
    {
        return [
            $user->nim, $user->nama, $user->role, $user->is_bekerja, $user->program_studi, $user->fakultas, $user->strata, $user->tahun_masuk, $user->tgl_wisuda, $user->tgl_yudisium, $user->ipk, $user->sks_kumulatif,$user->predikat_kelulusan, $user->judul_tugas_akhir, $user->tempat_lahir, $user->tgl_lahir, $user->jenis_kelamin, $user->kewarganegaraan, $user->provinsi, $user->kabupaten, $user->kecamatan, $user->alamat, $user->telepon,$user->email, $user->linkedin, $user->facebook
        ];
    }
}