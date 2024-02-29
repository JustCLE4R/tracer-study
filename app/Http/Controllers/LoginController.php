<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiIntegration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    $apiIntegration = new ApiIntegration();
    $studentData = $apiIntegration->loadStaticJson($credential['nim']);

    if(User::firstWhere('nim', $credential['nim']) == null && $studentData !== null){
      User::create($studentData);
    }
    
    if(Auth::attempt(['nim' => $credential['nim'], 'password' => md5($credential['password'])])){
      $request->session()->regenerate();
      
      return redirect()->intended('/dashboard');
    }

    if($studentData == null){
      return redirect('/login')->with('error', 'NIM yang anda masukkan tidak ditemukan');
    }

    return redirect('/login')->with('error', 'NIM atau password yang anda masukkan salah');
  }

  public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
