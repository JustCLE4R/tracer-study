<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

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
    return view('dashboard.perjalanan-karir.pendidikan.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rules = $request->validate([
      "tingkat_pendidikan" => "required",
      "program_studi" => "required",
      "perguruan_tinggi" => "required",
      "tanggal_surat_penerimaan_kuliah" => "required|date",
      "tanggal_mulai_kuliah" => "required|date",
      "status_saat_ini" => "required|in:0,1,2",
      "program_studi_satu_linier" => "required|in:0,1",
      "negara" => "required",
      "provinsi" => "required",
      "kabupaten" => "required",
      "upload_bukti_tanda_terima_kuliah" => "required|image|file|mimes:jpeg,png,jpg|max:2048",
    ],
    [
      'required' => ':attribute tidak boleh kosong',
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
      'tanggal_surat_penerimaan_kuliah' => 'Tanggal Surat Penerimaan',
      'tanggal_mulai_kuliah' => 'Tanggal Mulai Kuliah',
      'status_saat_ini' => 'Status Saat Ini',
      'program_studi_satu_linier' => 'Program Studi Satu Linier',
      'negara' => 'Negara',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'upload_bukti_tanda_terima_kuliah' => 'Bukti Tanda Terima Kuliah'
    ]
  );

  $rules['upload_bukti_tanda_terima_kuliah'] = $request->file('upload_bukti_tanda_terima_kuliah')->store('pendidikans-images');

  $prepareData = [
    'user_id' => auth()->user()->id,
    'tingkat_pendidikan' => $rules['tingkat_pendidikan'],
    'program_studi' => $rules['program_studi'],
    'perguruan_tinggi' => $rules['perguruan_tinggi'],
    'tgl_surat_penerimaan_kuliah' => $rules['tanggal_surat_penerimaan_kuliah'],
    'tgl_mulai_pendidikan' => $rules['tanggal_mulai_kuliah'],
    'is_studying' => $rules['status_saat_ini'],
    'is_linear' => $rules['program_studi_satu_linier'],
    'negara_pendidikan' => $rules['negara'],
    'provinsi_pendidikan' => $rules['provinsi'],
    'kabupaten_pendidikan' => $rules['kabupaten'],
    'bukti_pendidikan' => $rules['upload_bukti_tanda_terima_kuliah'],
  ];

  Pendidikan::create($prepareData);
  return redirect('/dashboard/perjalanan-karir')->with('success', 'Pendidikan baru telah ditambahkan!');

  }

  /**
   * Display the specified resource.
   */
  public function show(Pendidikan $pendidikan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pendidikan $pendidikan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pendidikan $pendidikan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pendidikan $pendidikan)
  {
    //
  }
}
