<?php

namespace App\Exports;

use App\Models\QuestionerStakeHolder;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StkQuestionerExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
        return QuestionerStakeHolder::with([
            'detailPerusahaan.pekerja.user', // Ensure relationships are correct
        ])
            ->when($this->tahun, fn($query) => $query->whereHas('detailPerusahaan.pekerja.user', fn($subQuery) => $subQuery->whereYear('tgl_wisuda', $this->tahun)))
            ->when($this->programStudi, fn($query) => $query->whereHas('detailPerusahaan.pekerja.user', fn($subQuery) => $subQuery->where('program_studi', $this->programStudi)))
            ->when($this->fakultas, fn($query) => $query->whereHas('detailPerusahaan.pekerja.user', fn($subQuery) => $subQuery->where('fakultas', $this->fakultas)))
            ->whereHas('detailPerusahaan.pekerja.user.certCheck', function ($query) {
                $query->where('profile_check', true)
                    ->where('perjalanan_karir_check', true)
                    ->where('questioner_check', true);
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

            '(c) Hubungan kerjasama apakah yang kantor/perusahaan anda Miliki saat ini dengan UINSU?',
            '(d) Hubungan apakah yang kantor/perusahaan anda Inginkan saat ini dengan UINSU?',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Ketaqwaan terhadap Tuhan yang maha Esa',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Etika dan kecerdasan dalam bertindak',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Keterampilan Bidang Teknologi Informasi (Internet dan Komputer)',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Kemampuan belajar',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Kemampuan berkomunikasi',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Kerjasama tim',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Kemampuan dalam memecahkan masalah',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Inovasi dan/atau kreativitas',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Pengetahuan di bidang atau disiplin ilmu anda',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Pengetahuan di luar bidang atau disiplin ilmu anda',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Pengembangan diri',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Mampu melakukan pendekatan integral-transdisipliner',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Etos Kerja',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Berakhlak mulia',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Pengetahuan umum dan memiliki wawasan kebangsaan',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Bervisi pengembangan peradaban',
            '(e) Menurut anda, seberapa pentingkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda? Aspek Kepemimpinan',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Ketaqwaan terhadap Tuhan yang maha Esa',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Etika dan kecerdasan dalam bertindak',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Keterampilan Bidang Teknologi Informasi (Internet dan Komputer)',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Kemampuan belajar',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Kemampuan berkomunikasi',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Kerjasama tim',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Kemampuan dalam memecahkan masalah',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Inovasi dan/atau kreativitas',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Pengetahuan di bidang atau disiplin ilmu anda',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Pengetahuan di luar bidang atau disiplin ilmu anda',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Pengembangan diri',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Mampu melakukan pendekatan integral-transdisipliner',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Etos Kerja',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Berakhlak mulia',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Pengetahuan umum dan memiliki wawasan kebangsaan',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Bervisi pengembangan peradaban',
            '(f) Bagaimanakah tingkat kepuasan anda terhadap Alumni UIN Sumatera Utara Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini? Aspek Kepemimpinan',
            '(g) Menurut Anda, Kompetensi HARDSKILL apakah yang menurut Anda kurang diberikan di UIN SU Medan?',
            '(i) Menurut Anda, Kompetensi SOFTSKILL apakah yang menurut Anda kurang diberikan di UINSU Medan',
            '(j) Apakah Usulan Anda untuk meningkatkan kompetensi Alumni yang sesuai dengan kebutuhan di Perusahaan Anda saat ini?',
        ];
    }

    public function map($stk): array
    {
        return [
            $stk->detailPerusahaan->pekerja->user->nim,
            $stk->detailPerusahaan->pekerja->user->nama,
            $stk->detailPerusahaan->pekerja->user->role,
            $stk->detailPerusahaan->pekerja->user->is_bekerja,
            $stk->detailPerusahaan->pekerja->user->program_studi,
            $stk->detailPerusahaan->pekerja->user->fakultas,
            $stk->detailPerusahaan->pekerja->user->strata,
            $stk->detailPerusahaan->pekerja->user->tahun_masuk,
            $stk->detailPerusahaan->pekerja->user->tgl_lulus,
            $stk->detailPerusahaan->pekerja->user->tgl_wisuda,
            $stk->detailPerusahaan->pekerja->user->tgl_yudisium,
            $stk->detailPerusahaan->pekerja->user->ipk,
            $stk->detailPerusahaan->pekerja->user->sks_kumulatif,
            $stk->detailPerusahaan->pekerja->user->predikat_kelulusan,
            $stk->detailPerusahaan->pekerja->user->judul_tugas_akhir,
            $stk->detailPerusahaan->pekerja->user->tempat_lahir,
            $stk->detailPerusahaan->pekerja->user->tgl_lahir,
            $stk->detailPerusahaan->pekerja->user->jenis_kelamin,
            $stk->detailPerusahaan->pekerja->user->kewarganegaraan,
            $stk->detailPerusahaan->pekerja->user->provinsi,
            $stk->detailPerusahaan->pekerja->user->kabupaten,
            $stk->detailPerusahaan->pekerja->user->kecamatan,
            $stk->detailPerusahaan->pekerja->user->alamat,
            $stk->detailPerusahaan->pekerja->user->telepon,
            $stk->detailPerusahaan->pekerja->user->email,
            $stk->detailPerusahaan->pekerja->user->linkedin,
            $stk->detailPerusahaan->pekerja->user->facebook,
            $stk->detailPerusahaan->pekerja->user->masa_studi_semester,
            $stk->detailPerusahaan->pekerja->user->lama_mendapatkan_pekerjaan,

            $stk->c_1,
            $stk->d_1,
            $stk->e_1,
            $stk->e_2,
            $stk->e_3,
            $stk->e_4,
            $stk->e_5,
            $stk->e_6,
            $stk->e_7,
            $stk->e_8,
            $stk->e_9,
            $stk->e_10,
            $stk->e_11,
            $stk->e_12,
            $stk->e_13,
            $stk->e_14,
            $stk->e_15,
            $stk->e_16,
            $stk->e_17,
            $stk->e_18,
            $stk->f_1,
            $stk->f_2,
            $stk->f_3,
            $stk->f_4,
            $stk->f_5,
            $stk->f_6,
            $stk->f_7,
            $stk->f_8,
            $stk->f_9,
            $stk->f_10,
            $stk->f_11,
            $stk->f_12,
            $stk->f_13,
            $stk->f_14,
            $stk->f_15,
            $stk->f_16,
            $stk->f_17,
            $stk->f_18,
            $stk->g_1,
            $stk->i_1,
            $stk->j_1,
        ];
    }
}
