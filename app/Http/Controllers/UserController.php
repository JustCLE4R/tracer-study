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
      'fakultas' => 'required|string|max:255',
      'strata' => 'required|string|max:255',
      'tgl_lulus' => 'required|before:today',
      'tgl_yudisium' => 'required|before:today',
      'tgl_wisuda' => 'required|before:today',
      'ipk' => 'required|numeric',
      'sks_kumulatif' => 'required|integer|min:0',
      'judul_tugas_akhir' => 'required|string|max:255',
      'nomor_ktp' => 'required|numeric|digits:16',
      'kewarganegaraan' => 'required|string|max:255',
      'provinsi' => 'required|string|max:255',
      'kabupaten' => 'required|string|max:255',
      'kecamatan' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
    ],
    [
      '*.max' => 'Input tidak boleh lebih dari 255 karakter',
      '*.required' => 'Input tidak boleh kosong',
      '*.numeric' => 'Input harus berupa angka',
      '*.integer' => 'Input harus berupa bilangan bulat',
      '*.digits' => 'Input harus berupa angka dan terdiri dari 16 karakter',
      '*.date' => 'Input harus berupa tanggal',
      '*.before' => 'Input harus berupa tanggal sebelum hari ini',
      '*.url' => 'Input harus berupa URL',
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
