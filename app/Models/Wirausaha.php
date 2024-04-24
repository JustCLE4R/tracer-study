<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wirausaha extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  public static function wirausahaStore($request){
    $rules = $request->validate([
      'pekerjaan' => 'required|string',
      'status-pekerjaan' => 'required|string',
      'nama-usaha' => 'required|string',
      'tingkat-ukuran-tempat-usaha' => 'required|string',
      'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
      'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
      'detail-usaha' => 'required|string',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'required|numeric',
      'jumlah-pendapatan-bersih-perbulan' => 'required|numeric',
      'pemodal-saat-ini' => 'required|array|min:1',
      'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
      'tanggal-mulai-berusaha' => 'required|date',
      'tanggal-akhir-berusaha' => 'date',
      'provinsi' => 'required|string',
      'kabupaten' => 'required|string',
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
      'max' => 'Kolom :attribute tidak boleh lebih dari :max kilobita.',
  ], [
      'pekerjaan' => 'Pekerjaan',
      'status-pekerjaan' => 'Status Pekerjaan',
      'nama-usaha' => 'Nama Usaha',
      'tingkat-ukuran-tempat-usaha' => 'Tingkat Ukuran Tempat Usaha',
      'bidang-usaha' => 'Bidang Usaha',
      'posisi-jabatan-pekerjaan' => 'Posisi Jabatan Pekerjaan',
      'detail-usaha' => 'Detail Usaha',
      'jumlah-pendapatan-perbulan-omset-penjualan' => 'Jumlah Pendapatan Per Bulan (Omset Penjualan)',
      'jumlah-pendapatan-bersih-perbulan' => 'Jumlah Pendapatan Bersih Per Bulan',
      'pemodal-saat-ini' => 'Pemodal Saat Ini',
      'kesesuaian-pekerjaan-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
      'tanggal-mulai-berusaha' => 'Tanggal Mulai Berusaha',
      'tanggal-akhir-berusaha' => 'Tanggal Akhir Berusaha',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'fotobukti-telah-berwirausaha' => 'Fotobukti Telah Berwirausaha',
  ]);

  $dataPrepare = [
    'user_id' => auth()->user()->id,
    'nama_usaha' => $rules['nama-usaha'],
    'tingkat_tempat_usaha' => $rules['tingkat-ukuran-tempat-usaha'],
    'bidang_usaha' => $rules['bidang-usaha'],
    'jabatan_usaha' => $rules['posisi-jabatan-pekerjaan'],
    'detail_usaha' => $rules['detail-usaha'],
    'omset' => $rules['jumlah-pendapatan-perbulan-omset-penjualan'],
    'pendapatan' => $rules['jumlah-pendapatan-bersih-perbulan'],
    'pemodal' => json_encode($rules['pemodal-saat-ini']),
    'kesesuaian' => $rules['kesesuaian-pekerjaan-dengan-prodi'],
    'tgl_mulai_usaha' => $rules['tanggal-mulai-berusaha'],
    'tgl_akhir_usaha' => $rules['tanggal-akhir-berusaha'],
    'provinsi_usaha' => $rules['provinsi'],
    'kabupaten_usaha' => $rules['kabupaten'],
    'bukti_berusaha' => $request->file('fotobukti-telah-berwirausaha')->store('bukti-wirausaha'),
  ];

    Wirausaha::create($dataPrepare);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data Wirausaha telah ditambahkan!');
  }

  /**
   * Just bunch of accessor
   */
  protected function getJabatanUsahaAttribute($value){
    $jabatanUsaha = [
      "a" => "Pemilik",
      "b" => "Direktur",
      "c" => "Kepala Unit",
      "d" => "Supervisor",
      "e" => "Staf",
      "f" => "Self Employed"
    ];

    return $jabatanUsaha[$value] ?? 'Unknown Jabatan';
  }
  /**
   * end of accessor
   */

  public function user() {
    return $this->belongsTo(User::class);
  }
}
