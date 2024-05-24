<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\DetailPerusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerja extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    // protected $with = [
    //   "user",
    // ];

    protected $with = [
        'detailPerusahaan'
    ];

    /**
     * Just bunch of accessor
     */
    protected function getIsActiveAttribute($value)
    {
        $isActive = [
            0 => "Usaha Tidak Aktif",
            1 => "Usaha Aktif"
        ];

        return $isActive[$value] ?? 'Unknown State';
    }

    protected function getStatusPekerjaanAttribute($value)
    {
        $statusPekerjaan = [
            'a' => 'Full-time',
            'b' => 'Part-time',
        ];

        return $statusPekerjaan[$value] ?? 'Unknown Status Pekerjaan';
    }

    protected function getKriteriaPekerjaanAttribute($value)
    {
        $kriteriaPekerjaan = [
            'a' => "Instansi pemerintah (termasuk BUMN)",
            'b' => 'Organisasi non-profit / lembaga swadaya masyarakat',
            'c' => 'Perusahaan Swasta',
            'd' => 'Freelance (Self Employed) (termasuk Dai)',
        ];

        return $kriteriaPekerjaan[$value] ?? 'Unknown Kriteria Pekerjaan';
    }

    protected function getBidangPekerjaanAttribute($value)
    {
        $bidangPekerjaan = [
            'a' => 'Pertanian, perikanan, dan kehutanan',
            'b' => 'Pertambangan dan penggalian',
            'c' => 'Industri pengolahan',
            'd' => 'Pengadaan listrik, gas, uap/air panas, dan udara dingin',
            'e' => 'Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi',
            'f' => 'Konstruksi',
            'g' => 'Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor',
            'h' => 'Pengangkutan dan pergudangan',
            'i' => 'Penyediaan akomodasi dan penyediaan makanan dan minuman',
            'j' => 'Informasi dan komunikasi',
            'k' => 'Aktivitas keuangan dan asuransi',
            'l' => 'Real estate',
            'm' => 'Aktivitas profesional, ilmiah, dan teknis',
            'n' => 'Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usaha lainnya',
            'o' => 'Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib',
            'p' => 'Aktivitas Pendidikan',
            'q' => 'Aktivitas kesehatan dan aktivitas sosial',
            'r' => 'Kesenian, hiburan dan rekreasi',
            's' => 'Aktivitas jasa lainnya',
            't' => 'Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk memenuhi kebutuhan sendiri',
            'u' => 'Aktivitas badan internasional dan badan ekstra internasional lainnya',
        ];

        return $bidangPekerjaan[$value] ?? 'Unknown Bidang Usaha';
    }

    protected function getTingkatTempatBekerjaAttribute($value)
    {
        $tingkatTempatBekerja = [
            "a" => "Lokal",
            "b" => "Nasional",
            "c" => "Multinasional"
        ];

        return $tingkatTempatBekerja[$value] ?? 'Unknown Tingkat Tempat Bekerja';
    }

    protected function getJabatanPekerjaanAttribute($value)
    {
        $jabatanPekerjaan = [
            "a" => "Pemilik",
            "b" => "Direktur",
            "c" => "Kepala Unit",
            "d" => "Supervisor",
            "e" => "Staf",
            "f" => "Self Employed"
        ];

        return $jabatanPekerjaan[$value] ?? 'Unknown Jabatan';
    }

    protected function getKesesuaianAttribute($value)
    {
        $kesesuaian = [
            "a" => "Tinggi",
            "b" => "Sedang",
            "c" => "Rendah"
        ];

        return $kesesuaian[$value] ?? 'Unknown Kesesuaian';
    }
    /**
     * end of accessor
     */


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailPerusahaan()
    {
        return $this->hasOne(DetailPerusahaan::class);
    }
}
