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
    $apiIntegration = new ApiIntegration();

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
    $responseStatus = $apiIntegration->getStudentAuth($credential['nim'], $credential['password']);

    if(User::firstWhere('nim', $credential['nim']) == null && isset($responseStatus['OtentikasiUser'][0]['status'])){
      $authData = $responseStatus['OtentikasiUser'][0];
      $dataFromAPI = $apiIntegration->getStudentData($credential['nim'])['DataMahasiswa'][0];
      
      $mhsData = [
        'nim' => $authData['user'],
        'password' => $authData['password'],
        'nama' => $authData['nama_lengkap'],
        'program_studi' => $authData['nama_prodi'],
        'tahun_masuk' => $dataFromAPI['mhs_thn_masuk'],
        'jenis_kelamin' => $dataFromAPI['mhs_jenis_kelamin'],
        'alamat' => $dataFromAPI['mhs_alamat'],
        'telepon' => $dataFromAPI['mhs_no_telp'],
        'email' => $dataFromAPI['mhs_email'],
        'tempat_lahir' => $dataFromAPI['mhs_tempat_lahir'],
        'tanggal_lahir' => $dataFromAPI['mhs_tanggal_lahir'],
      ];

      return $mhsData;
      // User::create($mhsData);
    }
    
    if(Auth::attempt(['nim' => $credential['nim'], 'password' => md5($credential['password'])])){
      $request->session()->regenerate();
      
      return redirect()->intended('/dashboard');
    }

    // if($authData == null){
    //   return redirect('/login')->with('error', 'NIM yang anda masukkan tidak ditemukan');
    // }

    return redirect('/login')->with('error', 'NIM atau password yang anda masukkan salah');
  }

  public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
