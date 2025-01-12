<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\CertCheck;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
  public function index(){
    return view('dashboard.mahasiswa.profile.index');
  }

  public function edit(){
    return view('dashboard.mahasiswa.profile.edit');
  }

  public function update(UpdateUserRequest $request){
    $request['predikat_kelulusan'] = $this->calculatePredicate($request->ipk);

    $request->user()->update($request->all());

    CertCheck::updateOrCreate([
      'user_id' => $request->user()->id
    ], [
      'profile_check' => true
    ]);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Profil berhasil diperbarui');
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
