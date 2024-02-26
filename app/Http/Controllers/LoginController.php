<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index(){
    return view('login');
  }

  public function authenticate(Request $request){
    $credential = $request->validate(
    [
      'nim' => 'required|size:10',
      'password' => 'required'
    ],
    [
      'nim.required' => 'NIM harus diisi',
      'nim.size' => 'NIM harus 10 digit',
      'password.required' => 'Password harus diisi'
    ]);
    // nunggu API mahasiswa
    return dd($credential);
  }
}
