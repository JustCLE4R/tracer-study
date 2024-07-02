<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\CertCheck;

class UserController extends Controller
{
  public function index(){
    return view('dashboard.profile.index');
  }

  public function edit(){
    return view('dashboard.profile.edit');
  }

  public function update(UpdateUserRequest $request){
    $rules['predikat_kelulusan'] = $this->calculatePredicate($request->ipk);

    $request->user()->update($rules);

    CertCheck::updateOrCreate([
      'user_id' => $request->user()->id
    ], [
      'profile_check' => true
    ]);

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
