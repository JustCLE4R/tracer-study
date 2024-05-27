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

  public function whatsappGateway($phone, $message){
    try {
      $response = Http::post(env('WA_GATEWAY'), [
        'number' => $phone,
        'message' => $message
      ]);

      return $response->json();
    } catch (Throwable $e) {
      return ['modelError' => $e->getMessage()];
    }
  }

  public function calculatePredicate($ipk){
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
