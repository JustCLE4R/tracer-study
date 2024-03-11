<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ApiIntegration extends Model
{
  public function getStudentAuth($username, $password){
    $response = Http::withHeaders([
      'UINSU-KEY' => env('UINSU_KEY'),
    ])->post('https://ws.uinsu.ac.id/portal/OtentikasiUser', [
      'username' => $username,
      'password' => $password,
    ]);

    return $response->json();
  }

  public function getStudentData($nim){
    $response = Http::withHeaders([
      'UINSU-KEY' => env('UINSU_KEY'),
    ])->post('https://ws.uinsu.ac.id/portal/DataMahasiswa', [
      'nim_mhs' => $nim
    ]);

    return $response->json();
  }

  public function getALumniData($nim){
    $response = Http::withHeaders([
      'UINSU-KEY' => env('UINSU_KEY'),
    ])->post('https://ws.uinsu.ac.id/portal/DataAlumni', [
      'nim_mhs' => $nim
    ]);

    return $response->json();
  }

  public function loadStaticJson($nim){
    $filePath = storage_path('json/student.json');

    if(file_exists($filePath)){
      $rawData = json_decode(file_get_contents($filePath), true);

      $collection = new Collection($rawData);

      return $collection->firstWhere('nim', $nim);
    }

    return null;
  }
}
