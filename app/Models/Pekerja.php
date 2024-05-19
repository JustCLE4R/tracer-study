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

  public static function pekerjaStore($request){
    $rules = $request->validate([
      'pekerjaan' => 'required|string',
      'status-pekerjaan' => 'required|string',
      'kriteria-pekerjaan' => 'required|string|in:a,b,c,d',
      'bidang-pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
      'tingkat-ukuran-tempat-bekerja' => 'required|string|in:a,b,c',
      'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
      'detail-pekerjaan' => 'required|string',
      'jumlah-pendapatan-perbulan' => 'required|numeric',
      'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
      'tanggal-mulai-bekerja' => 'required|date',
      'tanggal-akhir-kerja-kosongkan-jika-masih-bekerja' => 'nullable|date',
      'provinsi' => 'required|string',
      'kabupaten' => 'required|string',
      'fotobukti-telah-bekerja' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

      // info perusahaan
      'nama-perusahaan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
      'nama-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
      'posisi-jabatan-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
      'nomor-telepon-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
      'alamat-perusahaan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
      'alamat-email-aktif-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'email'],
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
      'kriteria-pekerjaan' => 'Kriteria Pekerjaan',
      'bidang-pekerjaan' => 'Bidang Pekerjaan',
      'tingkat-ukuran-tempat-bekerja' => 'Tingkat Ukuran Tempat Bekerja',
      'posisi-jabatan-pekerjaan' => 'Posisi Jabatan Pekerjaan',
      'detail-pekerjaan' => 'Detail Pekerjaan',
      'jumlah-pendapatan-perbulan' => 'Jumlah Pendapatan Per Bulan',
      'kesesuaian-pekerjaan-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
      'tanggal-mulai-bekerja' => 'Tanggal Mulai Bekerja',
      'tanggal-akhir-kerja-kosongkan-jika-masih-bekerja' => 'Tanggal Akhir Bekerja',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'fotobukti-telah-bekerja' => 'Foto Bukti Telah Bekerja',

      // info perusahaan
      'nama-perusahaan' => 'Nama Perusahaan',
      'nama-atasan' => 'Nama Atasan',
      'posisi-jabatan-atasan' => 'Posisi Jabatan Atasan',
      'nomor-telepon-atasan' => 'Nomor Telepon Atasan',
      'alamat-perusahaan' => 'Alamat Perusahaan',
      'alamat-email-aktif-atasan' => 'Alamat Email Aktif Atasan',
    ]);

    
    $dataAkhirKerja = [];

    // cek jika inputan tanggal akhir kerja ada dan mematikan is_active
    if(isset($rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'])){
      $dataAkhirKerja = [
        'is_active' => 0,
        'tgl_akhir_kerja' => $rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'],
      ];
    }
  
    $dataPrepare = [
      'user_id' => auth()->user()->id,
      'status_pekerjaan' => $rules['status-pekerjaan'],
      'kriteria_pekerjaan' => $rules['kriteria-pekerjaan'],
      'bidang_pekerjaan' => $rules['bidang-pekerjaan'],
      'tingkat_tempat_bekerja' => $rules['tingkat-ukuran-tempat-bekerja'],
      'jabatan_pekerjaan' => $rules['posisi-jabatan-pekerjaan'],
      'detail_pekerjaan' => $rules['detail-pekerjaan'],
      'pendapatan' => $rules['jumlah-pendapatan-perbulan'],
      'kesesuaian' => $rules['kesesuaian-pekerjaan-dengan-prodi'],
      'tgl_mulai_kerja' => $rules['tanggal-mulai-bekerja'],
      'provinsi_kerja' => $rules['provinsi'],
      'kabupaten_kerja' => $rules['kabupaten'] ,
      'bukti_bekerja' => $request->file('fotobukti-telah-bekerja')->store('bukti-bekerja'),
    ] + $dataAkhirKerja;

    $pekerja = Pekerja::create($dataPrepare);
    
    // cek jika freelance dan early return 
    if($rules['status-pekerjaan'] == 'b' && $rules['kriteria-pekerjaan'] == 'd'){
      return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
    }
    
    // pembuatan token untuk link public yang diakses oleh stakeholder
    do {
      $token = Str::random(255);
    } while (DetailPerusahaan::where('token', $token)->first());

    $detail_perusahaan = [
      'pekerja_id' => $pekerja->id,
      'nama_perusahaan' => $rules['nama-perusahaan'],
      'nama_atasan' => $rules['nama-atasan'],
      'jabatan_atasan' => $rules['posisi-jabatan-atasan'],
      'telepon_atasan' => $rules['nomor-telepon-atasan'],
      'alamat_perusahaan' => $rules['alamat-perusahaan'],
      'email_atasan' => $rules['alamat-email-aktif-atasan'],
      'token' => $token
    ];

    DetailPerusahaan::create($detail_perusahaan);
    
    // kirim notif ke stakeholder

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
  }

  public static function pekerjaUpdate($request, $pekerja){
    $rules = $request->validate([
      'bidang-pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
      'tingkat-ukuran-tempat-bekerja' => 'required|string|in:a,b,c',
      'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
      'detail-pekerjaan' => 'required|string',
      'jumlah-pendapatan-perbulan' => 'required|numeric',
      'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
      'tanggal-mulai-bekerja' => 'required|date',
      'tanggal-akhir-kerja' => 'nullable|date',
      'provinsi' => 'required|string',
      'kabupaten' => 'required|string',
      'fotobukti-telah-bekerja' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

      // info perusahaan
      'nama-perusahaan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
      'nama-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
      'posisi-jabatan-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
      'nomor-telepon-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
      'alamat-perusahaan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
      'alamat-email-aktif-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'email'],
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
      'bidang-pekerjaan' => 'Bidang Pekerjaan',
      'tingkat-ukuran-tempat-bekerja' => 'Tingkat Ukuran Tempat Bekerja',
      'posisi-jabatan-pekerjaan' => 'Posisi Jabatan Pekerjaan',
      'detail-pekerjaan' => 'Detail Pekerjaan',
      'jumlah-pendapatan-perbulan' => 'Jumlah Pendapatan Per Bulan',
      'kesesuaian-pekerjaan-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
      'tanggal-mulai-bekerja' => 'Tanggal Mulai Bekerja',
      'tanggal-akhir-kerja' => 'Tanggal Akhir Bekerja',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'fotobukti-telah-bekerja' => 'Foto Bukti Telah Bekerja',

      // info perusahaan
      'nama-perusahaan' => 'Nama Perusahaan',
      'nama-atasan' => 'Nama Atasan',
      'posisi-jabatan-atasan' => 'Posisi Jabatan Atasan',
      'nomor-telepon-atasan' => 'Nomor Telepon Atasan',
      'alamat-perusahaan' => 'Alamat Perusahaan',
      'alamat-email-aktif-atasan' => 'Alamat Email Aktif Atasan',
    ]);

    $dataAkhirKerja = [];
    if(isset($rules['tanggal-akhir-kerja'])){
      $dataAkhirKerja = [
        'is_active' => 0,
        'tgl_akhir_kerja' => $rules['tanggal-akhir-kerja'],
      ];
    } else {
      $dataAkhirKerja = [
        'is_active' => 1,
        'tgl_akhir_kerja' => null,
      ];
    }
  
    $dataPrepare = [
      // 'user_id' => auth()->user()->id,
      'bidang_pekerjaan' => $rules['bidang-pekerjaan'],
      'tingkat_tempat_bekerja' => $rules['tingkat-ukuran-tempat-bekerja'],
      'jabatan_pekerjaan' => $rules['posisi-jabatan-pekerjaan'],
      'detail_pekerjaan' => $rules['detail-pekerjaan'],
      'pendapatan' => $rules['jumlah-pendapatan-perbulan'],
      'kesesuaian' => $rules['kesesuaian-pekerjaan-dengan-prodi'],
      'tgl_mulai_kerja' => $rules['tanggal-mulai-bekerja'],
      'provinsi_kerja' => $rules['provinsi'],
      'kabupaten_kerja' => $rules['kabupaten'] ,
    ] + $dataAkhirKerja;

    if(isset($rules['fotobukti-telah-bekerja'])){
      Storage::delete($pekerja->bukti_bekerja);
      $dataPrepare['bukti_bekerja'] = $request->file('fotobukti-telah-bekerja')->store('bukti-bekerja');
    }

    $pekerja->update($dataPrepare);
    
    if($pekerja->getRawOriginal('kriteria_pekerjaan') == 'd' && auth()->user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$pekerja->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
    }

    if($pekerja->getRawOriginal('kriteria_pekerjaan') == 'd'){
      return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil diubah!');
    }

    $detail_perusahaan = [
      'pekerja_id' => $pekerja->id,
      'nama_perusahaan' => $rules['nama-perusahaan'],
      'nama_atasan' => $rules['nama-atasan'],
      'jabatan_atasan' => $rules['posisi-jabatan-atasan'],
      'telepon_atasan' => $rules['nomor-telepon-atasan'],
      'alamat_perusahaan' => $rules['alamat-perusahaan'],
      'email_atasan' => $rules['alamat-email-aktif-atasan'],
    ];

    // cek jika nomor telepon atasan berubah atau tidak untuk membuat token baru
    if($rules['nomor-telepon-atasan'] != $pekerja->detailPerusahaan->telepon_atasan){
      do {
        $detail_perusahaan['token'] = Str::random(255);
      } while (DetailPerusahaan::where('token', $detail_perusahaan['token'])->first());
    }

    DetailPerusahaan::where('pekerja_id', $pekerja->id)->update($detail_perusahaan);

    // Kirim notif ke stakeholder

    if(auth()->user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$pekerja->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
    }

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil diubah!');
  }

  /**
   * DRY function
   */
  private function whatsappGateway($nomorTelepon, $token, $message){
    
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

  protected function getStatusPekerjaanAttribute($value){
    $statusPekerjaan = [
      'a' => 'Full-time',
      'b' => 'Part-time',
    ];

    return $statusPekerjaan[$value] ?? 'Unknown Status Pekerjaan';
  }

  protected function getKriteriaPekerjaanAttribute($value){
    $kriteriaPekerjaan = [
      'a' => "Instansi pemerintah (termasuk BUMN)",
      'b' => 'Organisasi non-profit / lembaga swadaya masyarakat',
      'c' => 'Perusahaan Swasta',
      'd' => 'Freelance (Self Employed) (termasuk Dai)',
    ];

    return $kriteriaPekerjaan[$value] ?? 'Unknown Kriteria Pekerjaan';
  }

  protected function getBidangPekerjaanAttribute($value){
    $bidangPekerjaan= [
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

  protected function getTingkatTempatBekerjaAttribute($value){
    $tingkatTempatBekerja = [
      "a" => "Lokal",
      "b" => "Nasional",
      "c" => "Multinasional"
    ];

    return $tingkatTempatBekerja[$value] ?? 'Unknown Tingkat Tempat Bekerja';
  }

  protected function getJabatanPekerjaanAttribute($value){
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

  public function detailPerusahaan() {
    return $this->hasOne(DetailPerusahaan::class);
  }
}
