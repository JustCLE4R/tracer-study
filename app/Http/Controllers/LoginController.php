<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiIntegration;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(){
    return view('login');
  }

  public function authenticate(Request $request){
    $apiIntegration = new ApiIntegration();

    $credential = $request->validate(
    [
      'nim' => 'required|min:6|max:12',
      'password' => 'required'
    ],
    [
      'nim.required' => 'NIM harus diisi',
      'nim.min' => 'NIM minimal 6 digit',
      'nim.max' => 'NIM maksimal 12 digit',
      'password.required' => 'Password harus diisi'
    ]);

    $authData = $apiIntegration->getStudentAuth($credential['nim'], $credential['password']);
    $nonAlumniData = $apiIntegration->getStudentData($credential['nim']);
    $alumniData = $apiIntegration->getAlumniData($credential['nim']);

    // cek ketersediaan API
    if(isset($authData['modelError']) || isset($nonAlumniData['modelError']) || isset($alumniData['modelError'])){
      return redirect('/login')->with('error', 'API Server Error');
    }

    // cek ketersediaan data dan buat ke database
    $apiIntegration->createWithMhsData($credential, $authData, $nonAlumniData, $alumniData);
    
    // percobaan login (dengan nim) jika semuanya normal
    if(Auth::attempt(['nim' => $credential['nim'], 'password' => md5($credential['password'])])){
      $request->session()->regenerate();
      
      return redirect()->intended('/dashboard');
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
