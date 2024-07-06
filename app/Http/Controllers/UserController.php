<?php

namespace App\Http\Controllers;

use App\Models\CertCheck;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;

class UserController extends Controller
{
  public function index(){
    return view('dashboard.profile.index');
  }

  public function edit(){
    return view('dashboard.profile.edit');
  }

  public function update(UpdateUserRequest $request){
    $request['predikat_kelulusan'] = $this->calculatePredicate($request->ipk);

    $request->user()->update($request->all());

    CertCheck::updateOrCreate([
      'user_id' => $request->user()->id
    ], [
      'profile_check' => true
    ]);

    return redirect('/dashboard/profile')->with('success', 'Profil berhasil diperbarui');
  }

  public function showUpdatePassword(){
    return view('dashboard.profile.updatePassword');
  }

  public function updatePassword(UpdateUserPasswordRequest $request){
    // $oldPassword = auth()->user()->password;

    // if(md5($request->old_password) != $oldPassword){
    //   return redirect('/dashboard/profile/updatePassword')->with('error', 'Password lama tidak sesuai');
    // }
    
    $request->user()->update([
      'password' => md5($request->password)
    ]);

    return redirect('/dashboard')->with('success', 'Password berhasil diperbarui');
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
