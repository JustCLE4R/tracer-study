<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Wirausaha extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  // protected $with = [
  //   'user'
  // ];


  /**
   * Just bunch of accessor
   */

  protected function getIsActiveAttribute($value){
    $isActive = [
      0 => "Usaha Tidak Aktif",
      1 => "Usaha Aktif"
    ];

    return $isActive[$value] ?? 'Unknown State';
  }

  protected function getTingkatTempatUsahaAttribute($value){
    $tingkatTempatUsaha = [
      "a" => "Lokal",
      "b" => "Nasional",
      "c" => "Multinasional"
    ];

    return $tingkatTempatUsaha[$value] ?? 'Unknown Tingkat Tempat Usaha';
  }

  protected function getBidangUsahaAttribute($value){
    $bidangUsaha = [
      "a" => "Pertanian, perikanan, dan kehutanan",
      "b" => "Pertambangan dan penggalian",
      "c" => "Industri pengolahan",
      "d" => "Pengadaaan listrik, gas, uap/air panas, dan udara dingin",
      "e" => "Pengelolaan air, pengolahan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi",
      "f" => "Konstruksi",
      "g" => "Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor",
      "h" => "Pengangkutan dan pergudangan",
      "i" => "Penyediaan akomodasi dan penyediaan makanan dan minuman",
      "j" => "Informasi dan komunikasi",
      "k" => "Aktivitas keuangan dan asuransi",
      "l" => "Real estate",
      "m" => "Aktivitas profesional, ilmiah, dan teknis",
      "n" => "Aktivitas persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usaha lainnya",
      "o" => "Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib",
      "p" => "Aktivitas Pendidikan",
      "q" => "Aktivitas kesehatan dan aktivitas sosial",
      "r" => "Kesenian, hiburan dan rekreasi",
      "s" => "Aktivitas jasa lainnya",
      "t" => "Aktivitas rumah tangga sebagai pemberi kerja, aktivitas yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan untuk memenuhi kebutuhan sendiri yang digunakan untuk memenuhi kebutuhan sendiri",
      "u" => "Aktivitas badan internasional dan badan ekstra internasional lainnya"
    ];

    return $bidangUsaha[$value] ?? 'Unknown Bidang Usaha';
  }

  // protected function getPemodalAttribute($value){
  //   $pemodal = [
  //     "a" => "Pribadi / Tabungan",
  //     "b" => "Bank",
  //     "c" => "Keluarga",
  //     "d" => "Investor"
  //   ];

  //   return $pemodal[$value] ?? 'Unknown Pemodal';
  // }

  protected function getKesesuaianAttribute($value){
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

  public function user() {
    return $this->belongsTo(User::class);
  }
}
