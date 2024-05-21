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

  // TODO: Move this shit to Form Request
  public static function wirausahaStore($request){
    $rules = $request->validate([
      'pekerjaan' => 'required|string',
      'status-pekerjaan' => 'required|string',
      'nama-usaha' => 'required|string|max:255',
      'tingkat-ukuran-tempat-usaha' => 'required|string',
      'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
      'detail-usaha' => 'required|string|max:255',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'required|numeric',
      'jumlah-pendapatan-bersih-perbulan' => 'required|numeric',
      'pemodal-saat-ini' => 'required|array|min:1|max:4|in:a,b,c,d',
      'kesesuaian-usaha-dengan-prodi' => 'required|string|in:a,b,c',
      'tanggal-mulai-usaha' => 'required|date',
      'tanggal-akhir-usaha-kosongkan-jika-masih-memiliki-usaha' => 'nullable|date',
      'provinsi' => 'required|string|max:255',
      'kabupaten' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
      'fotobukti-telah-berwirausaha' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
  ], [
      'required' => 'Kolom :attribute wajib diisi.',
      'string' => 'Kolom :attribute harus berupa teks.',
      'in' => 'Kolom :attribute tidak valid.',
      'numeric' => 'Kolom :attribute harus berupa angka.',
      'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
      'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
      'image' => 'Kolom :attribute harus berupa gambar.',
      'mimes' => 'Kolom :attribute harus memiliki format: :values.',
      'max' => 'Kolom :attribute tidak boleh lebih dari :max',
  ], [
      'pekerjaan' => 'Pekerjaan',
      'status-pekerjaan' => 'Status Pekerjaan',
      'nama-usaha' => 'Nama Usaha',
      'tingkat-ukuran-tempat-usaha' => 'Tingkat Ukuran Tempat Usaha',
      'bidang-usaha' => 'Bidang Usaha',
      'detail-usaha' => 'Detail Usaha',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'Jumlah Pendapatan Per Bulan (Omset Penjualan)',
      'jumlah-pendapatan-bersih-perbulan' => 'Jumlah Pendapatan Bersih Per Bulan',
      'pemodal-saat-ini' => 'Pemodal Saat Ini',
      'kesesuaian-usaha-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
      'tanggal-mulai-berusaha' => 'Tanggal Mulai Berusaha',
      'tanggal-akhir-usaha-kosongkan-jika-masih-memiliki-usaha' => 'Tanggal Akhir Usaha',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'alamat' => 'Alamat',
      'fotobukti-telah-berwirausaha' => 'Fotobukti Telah Berwirausaha',
  ]);

  $dataAkhirUsaha = [];
  if(isset($rules['tanggal-akhir-usaha-kosongkan-jika-masih-memiliki-usaha'])){
    $dataAkhirUsaha = [
      'is_active' => 0,
      'tgl_akhir_usaha' => $rules['tanggal-akhir-usaha-kosongkan-jika-masih-memiliki-usaha'],
    ];
  }

  $dataPrepare = [
    'user_id' => auth()->user()->id,
    'nama_usaha' => $rules['nama-usaha'],
    'tingkat_tempat_usaha' => $rules['tingkat-ukuran-tempat-usaha'],
    'bidang_usaha' => $rules['bidang-usaha'],
    'detail_usaha' => $rules['detail-usaha'],
    'omset' => $rules['jumlah-pendapatan-perbulan-omset-penjualan'],
    'pendapatan' => $rules['jumlah-pendapatan-bersih-perbulan'],
    'pemodal' => json_encode($rules['pemodal-saat-ini']),
    'kesesuaian' => $rules['kesesuaian-usaha-dengan-prodi'],
    'tgl_mulai_usaha' => $rules['tanggal-mulai-usaha'],
    'provinsi_usaha' => $rules['provinsi'],
    'kabupaten_usaha' => $rules['kabupaten'],
    'alamat_usaha' => $rules['alamat'],
    'bukti_berusaha' => $request->file('fotobukti-telah-berwirausaha')->store('bukti-wirausaha'),
  ]+$dataAkhirUsaha;

    Wirausaha::create($dataPrepare);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data Wirausaha telah ditambahkan!');
  }

  public static function wirausahaUpdate($request, $wirausaha){
    $rules = $request->validate([
      'nama-usaha' => 'required|string|max:255',
      'tingkat-ukuran-tempat-usaha' => 'required|string',
      'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
      'detail-usaha' => 'required|string|max:255',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'required|numeric',
      'jumlah-pendapatan-bersih-perbulan' => 'required|numeric',
      'pemodal-saat-ini' => 'required|array|min:1|max:4|in:a,b,c,d',
      'kesesuaian-usaha-dengan-prodi' => 'required|string|in:a,b,c',
      'tanggal-mulai-usaha' => 'required|date',
      'tanggal-akhir-usaha' => 'nullable|date',
      'provinsi' => 'required|string|max:255',
      'kabupaten' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
      'fotobukti-telah-berwirausaha' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
    ], [
      'required' => 'Kolom :attribute wajib diisi.',
      'string' => 'Kolom :attribute harus berupa teks.',
      'in' => 'Kolom :attribute tidak valid.',
      'numeric' => 'Kolom :attribute harus berupa angka.',
      'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
      'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
      'image' => 'Kolom :attribute harus berupa gambar.',
      'mimes' => 'Kolom :attribute harus memiliki format: :values.',
      'max' => 'Kolom :attribute tidak boleh lebih dari :max',
    ], [
      'nama-usaha' => 'Nama Usaha',
      'tingkat-ukuran-tempat-usaha' => 'Tingkat Ukuran Tempat Usaha',
      'bidang-usaha' => 'Bidang Usaha',
      'detail-usaha' => 'Detail Usaha',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'Jumlah Pendapatan Per Bulan (Omset Penjualan)',
      'jumlah-pendapatan-bersih-perbulan' => 'Jumlah Pendapatan Bersih Per Bulan',
      'pemodal-saat-ini' => 'Pemodal Saat Ini',
      'kesesuaian-usaha-dengan-prodi' => 'Kesesuaian Usaha dengan Program Studi',
      'tanggal-mulai-berusaha' => 'Tanggal Mulai Berusaha',
      'tanggal-akhir-usaha' => 'Tanggal Akhir Usaha',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'alamat' => 'Alamat',
      'fotobukti-telah-berwirausaha' => 'Fotobukti Telah Berwirausaha',
    ]);

    $dataAkhirUsaha = [];
    if(isset($rules['tanggal-akhir-usaha'])){
      $dataAkhirUsaha = [
        'is_active' => 0,
        'tgl_akhir_usaha' => $rules['tanggal-akhir-usaha'],
      ];
    } else {
      $dataAkhirUsaha = [
        'is_active' => 1,
        'tgl_akhir_usaha' => null,
      ];
    }

    $dataPrepare = [
      // 'user_id' => auth()->user()->id,
      'nama_usaha' => $rules['nama-usaha'],
      'tingkat_tempat_usaha' => $rules['tingkat-ukuran-tempat-usaha'],
      'bidang_usaha' => $rules['bidang-usaha'],
      'detail_usaha' => $rules['detail-usaha'],
      'omset' => $rules['jumlah-pendapatan-perbulan-omset-penjualan'],
      'pendapatan' => $rules['jumlah-pendapatan-bersih-perbulan'],
      'pemodal' => json_encode($rules['pemodal-saat-ini']),
      'kesesuaian' => $rules['kesesuaian-usaha-dengan-prodi'],
      'tgl_mulai_usaha' => $rules['tanggal-mulai-usaha'],
      'provinsi_usaha' => $rules['provinsi'],
      'kabupaten_usaha' => $rules['kabupaten'],
      'alamat_usaha' => $rules['alamat'],
    ]+$dataAkhirUsaha;

    if(isset($rules['fotobukti-telah-berwirausaha'])){
      Storage::delete($wirausaha->bukti_berusaha);
      $dataPrepare['bukti_berusaha'] = $request->file('fotobukti-telah-berwirausaha')->store('bukti-wirausaha');
    }

    $wirausaha->update($dataPrepare);

    if(auth()->user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$wirausaha->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
    }

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data Wirausaha telah diubah!');
  }

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
