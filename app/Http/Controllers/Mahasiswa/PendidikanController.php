<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\CertCheck;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
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
    return view('dashboard.mahasiswa.perjalanan-karir.pendidikan.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rules = $request->validate([
      "tingkat_pendidikan" => "required|in:a,b,c",
      "program_studi" => "required",
      "perguruan_tinggi" => "required",
      "tgl_surat_penerimaan_pendidikan" => "required|date",
      "tgl_mulai_pendidikan" => "required|date",
      "is_studying" => "required|in:0,1,2",
      "is_linear" => "required|in:0,1",
      "negara_pendidikan" => "required",
      "provinsi_pendidikan" => "required_if:negara_pendidikan,Indonesia",
      "kabupaten_pendidikan" => "required_if:negara_pendidikan,Indonesia",
      "alamat_pendidikan" => "required",
      "bukti_pendidikan" => "required|image|file|mimes:jpeg,png,jpg|max:2048",
    ],
    [
      'required' => ':attribute tidak boleh kosong',
      'required_unless' => ':attribute harus diisi jika :other :value',
      'required_if' => ':attribute harus diisi jika :other :value',
      'date' => ':attribute harus berupa tanggal',
      'in' => ':attribute tidak valid.',
      'image' => ':attribute harus berupa gambar',
      'mimes' => ':attribute harus berupa file dengan format :values',
      'max' => ':attribute tidak boleh lebih dari :max kilobytes'
    ],
    [
      'tingkat_pendidikan' => 'Tingkat Pendidikan',
      'program_studi' => 'Program Studi',
      'perguruan_tinggi' => 'Perguruan Tinggi',
      'tgl_surat_penerimaan_pendidikan' => 'Tanggal Surat Penerimaan',
      'tgl_mulai_pendidikan' => 'Tanggal Mulai Kuliah',
      'is_studying' => 'Status Saat Ini',
      'is_linear' => 'Program Studi Satu Linier',
      'negara_pendidikan' => 'Negara',
      'provinsi_pendidikan' => 'Provinsi',
      'kabupaten_pendidikan' => 'Kabupaten',
      'alamat_pendidikan' => 'Alamat',
      'bukti_pendidikan' => 'Bukti Tanda Terima Kuliah'
    ]);

    $rules['bukti_pendidikan'] = $request->file('bukti_pendidikan')->store('bukti-pendidikan');
    $rules['user_id'] = Auth::user()->id;

    Pendidikan::create($rules);

    CertCheck::updateOrCreate([
      'user_id' => Auth::user()->id
    ], [
      // 'pendidikan_check' => true
      'perjalanan_karir_check' => true
    ]);

    if(Auth::user()->wirausaha->count() > 1 || Auth::user()->pekerja->count() > 1){
      return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
    }

    return redirect('/dashboard/questioner')->with('success', 'Pendidikan baru telah ditambahkan!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Pendidikan $pendidikan)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($pendidikan->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $pendidikan->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    return view('dashboard.mahasiswa.perjalanan-karir.pendidikan.show', [
      'pendidikan' => $pendidikan
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pendidikan $pendidikan)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($pendidikan->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $pendidikan->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    return view('dashboard.mahasiswa.perjalanan-karir.pendidikan.edit', [
      'pendidikan' => $pendidikan
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pendidikan $pendidikan)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($pendidikan->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $pendidikan->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    $rules = $request->validate([
      "tingkat_pendidikan" => "required|in:a,b,c",
      "program_studi" => "required",
      "perguruan_tinggi" => "required",
      "tgl_surat_penerimaan_pendidikan" => "required|date",
      "tgl_mulai_pendidikan" => "required|date",
      "is_studying" => "required|in:0,1,2",
      "is_linear" => "required|in:0,1",
      "negara_pendidikan" => "required",
      "provinsi_pendidikan" => "required_if:negara_pendidikan,Indonesia",
      "kabupaten_pendidikan" => "required_if:negara_pendidikan,Indonesia",
      "alamat_pendidikan" => "required",
      "bukti_pendidikan" => "image|file|mimes:jpeg,png,jpg|max:2048",
    ],
    [
      'required' => ':attribute tidak boleh kosong',
      'required_unless' => ':attribute harus diisi jika :other :value',
      'required_if' => ':attribute harus diisi jika :other :value',
      'date' => ':attribute harus berupa tanggal',
      'in' => ':attribute tidak valid.',
      'image' => ':attribute harus berupa gambar',
      'mimes' => ':attribute harus berupa file dengan format :values',
      'max' => ':attribute tidak boleh lebih dari :max kilobytes'
    ],
    [
      'tingkat_pendidikan' => 'Tingkat Pendidikan',
      'program_studi' => 'Program Studi',
      'perguruan_tinggi' => 'Perguruan Tinggi',
      'tgl_surat_penerimaan_pendidikan' => 'Tanggal Surat Penerimaan',
      'tgl_mulai_pendidikan' => 'Tanggal Mulai Kuliah',
      'is_studying' => 'Status Saat Ini',
      'is_linear' => 'Program Studi Satu Linier',
      'negara_pendidikan' => 'Negara',
      'provinsi_pendidikan' => 'Provinsi',
      'kabupaten_pendidikan' => 'Kabupaten',
      'alamat_pendidikan' => 'Alamat',
      'bukti_pendidikan' => 'Bukti Tanda Terima Kuliah'
    ]);

    if(isset($rules['bukti_pendidikan'])) {
      Storage::delete($request->oldImage);
      
      $rules['bukti_pendidikan'] = $request->file('bukti_pendidikan')->store('bukti-pendidikan');
    }

    $pendidikan->update($rules);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Pendidikan telah diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pendidikan $pendidikan)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($pendidikan->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $pendidikan->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    Storage::delete($pendidikan->bukti_pendidikan);
    $pendidikan->delete();
    
    return redirect('/dashboard/perjalanan-karir')->with('success', 'Pendidikan telah dihapus!');
  }
}
