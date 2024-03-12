<?php

namespace App\Models;

use Throwable;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class ApiIntegration extends Model
{
  public function getStudentAuth($username, $password){
    try{
      $response = Http::withHeaders([
        'UINSU-KEY' => env('UINSU_KEY'),
      ])->post('https://ws.uinsu.ac.id/portal/OtentikasiUser', [
        'username' => $username,
        'password' => $password,
      ]);

      return $response->json();
    } catch (Throwable $e){
      return ['modelError' => $e->getMessage()];
    }
  }

  public function getStudentData($nim){
    try {
      $response = Http::withHeaders([
        'UINSU-KEY' => env('UINSU_KEY'),
      ])->post('https://ws.uinsu.ac.id/portal/DataMahasiswa', [
        'nim_mhs' => $nim
      ]);
  
      return $response->json();
    } catch (Throwable $e) {
      return ['modelError' => $e->getMessage()];
    }
  }

  public function getAlumniData($nim){
    try {
      $response = Http::withHeaders([
        'UINSU-KEY' => env('UINSU_KEY'),
      ])->post('https://ws.uinsu.ac.id/portal/DataAlumni', [
        'nim_mhs' => $nim
      ]);
  
      return $response->json();
    } catch (Throwable $e) {
      return ['modelError' => $e->getMessage()];
    }

  }

  public function createWithMhsData($credential, $authData, $nonAlumniData, $alumniData){
    if(User::firstWhere('nim', $credential['nim']) == null && !isset($authData['error']) && isset($alumniData['DataAlumni'])){
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
        'tgl_lahir' => $alumniData['tanggal_lahir'],
        'jenis_kelamin' => $alumniData['jenis_kelamin'],
        'kewarganegaraan' => $alumniData['kewarganegaraan'],
        'alamat' => $alumniData['jalan'],
        'telepon' => $alumniData['handphone'],
        'email' => $alumniData['email'],
      ];

      User::create($mhsData);
    } 
    // cek untuk data bukan alumni
    else if(User::firstWhere('nim', $credential['nim']) == null && !isset($authData['error']) && !isset($alumniData['DataAlumni'])){
      $authData = $authData['OtentikasiUser'][0];
      $nonAlumniData = $nonAlumniData['DataMahasiswa'][0];

      $mhsData = [
        'nim' => $authData['user'],
        'password' => $authData['password'],
        'nama' => $authData['nama_lengkap'],
        'program_studi' => $authData['nama_prodi'],
        // 'fakultas' => $nonAlumniData['FAKULTAS'],
        // 'strata' => $nonAlumniData['STRATA'],
        'tahun_masuk' => $nonAlumniData['mhs_thn_masuk'],
        // 'ipk' => $nonAlumniData['mhsIpkTranskrip'],
        // 'sks_kumulatif' => $nonAlumniData['mhsSksTranskrip'],
        // 'predikat_kelulusan' => $this->calculatePredicate($nonAlumniData['mhsIpkTranskrip']),
        // 'judul_tugas_akhir' => $nonAlumniData['JudulTA'],
        // 'foto' => $nonAlumniData['mhsFoto'],
        // 'nomor_ktp' => $nonAlumniData['nik'],
        'tempat_lahir' => $nonAlumniData['mhs_tempat_lahir'],
        'tgl_lahir' => $nonAlumniData['mhs_tanggal_lahir'],
        'jenis_kelamin' => $nonAlumniData['mhs_jenis_kelamin'],
        // 'kewarganegaraan' => $nonAlumniData['kewarganegaraan'],
        'alamat' => $nonAlumniData['mhs_alamat'],
        'telepon' => $nonAlumniData['mhs_no_telp'],
        'email' => $nonAlumniData['mhs_email'],
      ];

      User::create($mhsData);
    }
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
