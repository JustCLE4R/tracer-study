<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(){
    return view('dashboard.profile.index');
  }

  public function edit(){
    return view('dashboard.profile.edit');
  }

  public function update(Request $request){
    $rules = $request->validate([
      'telepon' => 'numeric|required',
      'email' => 'email|max:255',
      'linkedin' => 'nullable|url',
      'facebook' => 'nullable|url',
      'tgl_lulus' => 'required|date|before:today',
      'tgl_yudisium' => 'required|date|before:today',
      'tgl_wisuda' => 'required|date|before:today',
      'judul_tugas_akhir' => 'required|string|max:255',
      'provinsi' => 'required|string|max:255',
      'kabupaten' => 'required|string|max:255',
      'kecamatan' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
  ], [
      'required' => 'Kolom :attribute wajib diisi.',
      'numeric' => 'Kolom :attribute harus berupa angka.',
      'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
      'url' => 'Kolom :attribute harus berupa URL yang valid.',
      'date' => 'Kolom :attribute harus berupa tanggal yang valid',
      'before' => 'Kolom :attribute harus sebelum tanggal hari ini.',
      'string' => 'Kolom :attribute harus berupa teks.',
      'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
  ], [
      'telepon' => 'Telepon',
      'email' => 'Email',
      'linkedin' => 'Linkedin',
      'facebook' => 'Facebook',
      'tgl_lulus' => 'Tanggal Lulus',
      'tgl_yudisium' => 'Tanggal Yudisium',
      'tgl_wisuda' => 'Tanggal Wisuda',
      'judul_tugas_akhir' => 'Judul Tugas Akhir',
      'provinsi' => 'Provinsi',
      'kabupaten' => 'Kabupaten',
      'kecamatan' => 'Kecamatan',
      'alamat' => 'Alamat',
  ]);
  

    $rules['predikat_kelulusan'] = $this->calculatePredicate($request->ipk);

    $request->user()->update($rules);
    return redirect('/dashboard/profile')->with('success', 'Profil berhasil diperbarui');
  
  }

  private function calculatePredicate($ipk){
    if($ipk >= 3.51){
      return 'Terpuji';
    }else if($ipk >= 3.00){
      return 'Sangat Memuaskan';
    }else if($ipk >= 2.50){
      return 'Memuaskan';
    }else if($ipk >= 2.00){
      return 'Baik';
    }else{
      return 'Cukup';
    }
  }
}
