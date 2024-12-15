<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MhsQuestionerExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
        return User::with(['questioner', 'certCheck'])
        ->when($this->tahun, fn($query) => $query->whereYear('tgl_wisuda', $this->tahun))
        ->when($this->programStudi, fn($query) => $query->where('program_studi', $this->programStudi))
        ->when($this->fakultas, fn($query) => $query->where('fakultas', $this->fakultas))
        ->whereHas('certCheck', function ($query) {
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

            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Ketaqwaan terhadap Tuhan yang maha Esa',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Etika dan kecerdasan dalam bertindak',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Keterampilan Bidang Teknologi Informasi (Internet dan Komputer)',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Kemampuan belajar',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Kemampuan berkomunikasi',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Kerjasama tim',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Kemampuan dalam memecahkan masalah',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Inovasi atau kreatifitas',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Pengetahuan di bidang atau disiplin ilmu anda',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Pengetahuan di luar bidang atau disiplin ilmu anda',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Pengembangan diri',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Mampu melakukan pendekatan integral-transdisipliner',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Etos Kerja',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Berakhlak mulia',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Pengetahuan umum dan memiliki wawasan kebangsaan',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Bervisi pengembangan peradaban',
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai? Aspek Kepemimpinan',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Ketaqwaan terhadap Tuhan yang maha Esa',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Etika dan kecerdasan dalam bertindak',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Keterampilan Bidang Teknologi Informasi (Internet dan Komputer)',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Kemampuan belajar',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Kemampuan berkomunikasi',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Kerjasama tim',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Kemampuan dalam memecahkan masalah',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Inovasi dan/atau kreatifitas',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Pengetahuan di bidang atau disiplin ilmu anda',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Pengetahuan di luar bidang atau disiplin ilmu anda',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Pengembangan diri',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Mampu melakukan pendekatan integral-transdisipliner',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Etos Kerja',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Berakhlak mulia',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Pengetahuan umum dan memiliki wawasan kebangsaan',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Bervisi pengembangan peradaban',
            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai? Aspek Kepemimpinan',
            '(c) Peningkatan kompetensi yang anda peroleh didapat paling banyak dari',
            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda? Perkuliahan',
            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda? Demonstrasi/peragaan pembelajaran',
            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda? Partisipasi dalam proyek riset',
            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda? Magang',
            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda? Diskusi',
            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah',
            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? Bimbingan akademik',
            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? Variasi mata kuliah',
            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmuwan professional',
            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini? Beasiswa',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Perpustakaan',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Teknologi informasi dan komunikasi',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Pusat Bahasa',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Fasilitas olahraga',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Laboratorium/studio/workshop',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Kondisi dan sistem keamanan serta keselamatan',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Kondisi serta fasilitas toilet dan sanitari lainnya',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Kantin, koperasi dan sarana perbelanjaan di dalam kampus',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Pusat kegiatan mahasiswa beserta fasilitasnya dan ruang rekreasi',
            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini? Fasilitas layanan Kesehatan',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Memulai pekerjaan',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Pembelajaran yang berkelanjutan dalam pekerjaan',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Mendukung kemampuan / kinerja dalam menjalankan tugas',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Informasi karir dan peluang kerja',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Pengembangan diri',
            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini? Meningkatkan keterampilan kewirausahaan',
            '(h) Matakuliah yang paling berperan terhadap kelanjutan karir anda?',
            '(i) Matakuliah yang sebaiknya ditiadakan?',
            '(j) Matakuliah yang sebaiknya diadakan di kampus?',
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

            $user->questioner->first()->a_1,
            $user->questioner->first()->a_2,
            $user->questioner->first()->a_3,
            $user->questioner->first()->a_4,
            $user->questioner->first()->a_5,
            $user->questioner->first()->a_6,
            $user->questioner->first()->a_7,
            $user->questioner->first()->a_8,
            $user->questioner->first()->a_9,
            $user->questioner->first()->a_10,
            $user->questioner->first()->a_11,
            $user->questioner->first()->a_12,
            $user->questioner->first()->a_13,
            $user->questioner->first()->a_14,
            $user->questioner->first()->a_15,
            $user->questioner->first()->a_16,
            $user->questioner->first()->a_17,
            $user->questioner->first()->a_18,
            $user->questioner->first()->b_1,
            $user->questioner->first()->b_2,
            $user->questioner->first()->b_3,
            $user->questioner->first()->b_4,
            $user->questioner->first()->b_5,
            $user->questioner->first()->b_6,
            $user->questioner->first()->b_7,
            $user->questioner->first()->b_8,
            $user->questioner->first()->b_9,
            $user->questioner->first()->b_10,
            $user->questioner->first()->b_11,
            $user->questioner->first()->b_12,
            $user->questioner->first()->b_13,
            $user->questioner->first()->b_14,
            $user->questioner->first()->b_15,
            $user->questioner->first()->b_16,
            $user->questioner->first()->b_17,
            $user->questioner->first()->b_18,
            $user->questioner->first()->c_1,
            $user->questioner->first()->d_1,
            $user->questioner->first()->d_2,
            $user->questioner->first()->d_3,
            $user->questioner->first()->d_4,
            $user->questioner->first()->d_5,
            $user->questioner->first()->e_1,
            $user->questioner->first()->e_2,
            $user->questioner->first()->e_3,
            $user->questioner->first()->e_4,
            $user->questioner->first()->e_5,
            $user->questioner->first()->f_1,
            $user->questioner->first()->f_2,
            $user->questioner->first()->f_3,
            $user->questioner->first()->f_4,
            $user->questioner->first()->f_5,
            $user->questioner->first()->f_6,
            $user->questioner->first()->f_7,
            $user->questioner->first()->f_8,
            $user->questioner->first()->f_9,
            $user->questioner->first()->f_10,
            $user->questioner->first()->g_1,
            $user->questioner->first()->g_2,
            $user->questioner->first()->g_3,
            $user->questioner->first()->g_4,
            $user->questioner->first()->g_5,
            $user->questioner->first()->g_6,
            $user->questioner->first()->h_1,
            $user->questioner->first()->i_1,
            $user->questioner->first()->j_1,
        ];
    }
}
