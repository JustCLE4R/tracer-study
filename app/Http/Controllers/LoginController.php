<?php

namespace App\Http\Controllers;

use App\Models\User;
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
      'nim' => 'required|min:6|max:20',
      'password' => 'required'
    ],
    [
      'nim.required' => 'NIM harus diisi',
      'nim.min' => 'NIM minimal 6 digit',
      'nim.max' => 'NIM maksimal 20 digit',
      'password.required' => 'Password harus diisi'
    ]);

    $authData = $apiIntegration->getStudentAuth($credential['nim'], $credential['password']);
    $alumniData = $apiIntegration->getAlumniData($credential['nim']);

    // cek ketersediaan API
    if(isset($authData['modelError']) || isset($alumniData['modelError'])){
      return redirect('/login')->with('error', 'API Server Error');
    }

    // cek ketersediaan data dan masukan ke database
    if(User::firstWhere('nim', $credential['nim']) == null && !isset($authData['error'])){
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
        'predikat_kelulusan' => $apiIntegration->calculatePredicate($alumniData['mhsIpkTranskrip']),
        'judul_tugas_akhir' => $alumniData['JudulTA'],
        'foto' => $alumniData['mhsFoto'],
        'nomor_ktp' => $alumniData['nik'],
        'tempat_lahir' => $alumniData['tempat_lahir'],
        'tgl_lahir' => $alumniData['tanggal_lahir'],
        'jenis_kelamin' => $alumniData['jenis_kelamin'],
        'kewarganegaraan' => $alumniData['kewarganegaraan'],
        'alamat' => $alumniData['jalan'],
        'telepon' => $alumniData['handphone'],
        'email' => $alumniData['email'],
      ];

      User::create($mhsData);
    } 
    
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
