<?php

namespace App\Http\Controllers;

use App\Models\DetailPerusahaan;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PekerjaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return abort(404);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.perjalanan-karir.kerja.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    switch ($request->pekerjaan){
      case 'pekerja':
        return $this->pekerjaStore($request);
        break;
      case 'wirausaha':
        return $this->wirausahaStore($request);
        break;
      case 'belum-kerja':
        return $this->nganggurStore($request);
        break;
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Private function untuk menyimpan data pekerjaan (Bekerja, Wirausaha, Nganggur)
   */
  private function pekerjaStore($request){
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
      'tanggal-akhir-kerja' => 'date',
      'provinsi' => 'required|string',
      'kabupaten' => 'required|string',
      'fotobukti-telah-bekerja' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

      // info perusahaan
      'nama-perusahaan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string'],
      'nama-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string'],
      'posisi-jabatan-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string'],
      'nomor-telepon-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string'],
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
      'max' => 'Kolom :attribute tidak boleh lebih dari :max kilobita.',
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
      'tanggal-akhir-kerja' => 'Tanggal Akhir Bekerja',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'fotobukti-telah-bekerja' => 'Foto Bukti Telah Bekerja',

      // info perusahaan
      'nama-perusahaan' => 'Nama Perusahaan',
      'nama-atasan' => 'Nama Atasan',
      'posisi-jabatan-atasan' => 'Posisi Jabatan Atasan',
      'nomor-telepon-atasan' => 'Nomor Telepon Atasan',
      'alamat-email-aktif-atasan' => 'Alamat Email Aktif Atasan',
    ]);
  
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
      'tgl_akhir_kerja' => $rules['tanggal-akhir-kerja'],
      'provinsi_kerja' => $rules['provinsi'],
      'kabupaten_kerja' => $rules['kabupaten'] ,
      'bukti_bekerja' => $request->file('fotobukti-telah-bekerja')->store('bukti-bekerja'),
    ];
    
    $pekerja = Pekerja::create($dataPrepare);
    
    if($rules['status-pekerjaan'] == 'parttime' && $rules['kriteria-pekerjaan'] == 'd'){
      return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
    }
    
    $detail_perusahaan = [
      'pekerja_id' => $pekerja->id,
      'nama_perusahaan' => $rules['nama-perusahaan'],
      'nama_atasan' => $rules['nama-atasan'],
      'jabatan_atasan' => $rules['posisi-jabatan-atasan'],
      'telepon_atasan' => $rules['nomor-telepon-atasan'],
      'email_atasan' => $rules['alamat-email-aktif-atasan'],
    ];

    DetailPerusahaan::create($detail_perusahaan);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
  }

  private function wirausahaStore($request){
    $rules = $request->validate([
      'pekerjaan' => 'required|string',
      'status-pekerjaan' => 'required|string',
      'nama-usaha' => 'required|string',
      'tingkat-ukuran-tempat-usaha' => 'required|string',
      'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,u',
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

  private function nganggurStore($request){
    $request->validate([
      'saya-belum-memiliki-pekerjaan' => 'required|array|size:1'
    ], [
      'required' => 'Centang pernyataan :attribute',
    ], [
      'saya-belum-memiliki-pekerjaan' => '"Ya, saya belum bekerja"'
    ]);

    Pekerja::create([
      'user_id' => auth()->user()->id,
      'is_bekerja' => 0
    ]);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data tidak bekerja telah ditambahkan!');
  }
}
