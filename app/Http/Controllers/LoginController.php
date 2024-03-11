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
    $alumniData = $apiIntegration->getALumniData($credential['nim']);

    if(User::firstWhere('nim', $credential['nim']) == null && !isset($authData['error'])){
      dd($authData, $alumniData);
      $authData = $authData['OtentikasiUser'][0];
      $alumniData = $alumniData['DataAlumni'][0];


      $mhsData = [
        'nim' => $authData['user'],
        'password' => $authData['password'],
        'nama' => $authData['nama_lengkap'],
        'program_studi' => $alumniData['PRODI'],
        'fakultas' => $alumniData['FAKULTAS'],
        'strata' => $alumniData['STRATA'],
        'tahun_masuk' => $alumniData['mhs_angkatan'],
        'ipk' => $alumniData['mhsIpkTranskrip'],
        'sks_kumulatif' => $alumniData['mhsSksTranskrip'],
        'predikat_kelulusan' => $this->calculatePredicate($alumniData['mhsIpkTranskrip']),
        'judul_tugas_akhir' => $alumniData['JudulTA'],
        'foto' => $alumniData['mhsFoto'],
        'nomor_ktp' => $alumniData['nik'],
        'tempat_lahir' => $alumniData['tempat_lahir'],
        'tanggal_lahir' => $alumniData['tanggal_lahir'],
        'jenis_kelamin' => $alumniData['jenis_kelamin'],
        'kewarganegaraan' => $alumniData['kewarganegaraan'],
        'alamat' => $alumniData['jalan'],
        'telepon' => $alumniData['handphone'],
        'email' => $alumniData['email'],
      ];

      dd($mhsData);
      User::create($mhsData);
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
