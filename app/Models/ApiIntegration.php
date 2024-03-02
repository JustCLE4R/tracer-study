<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ApiIntegration extends Model
{
  public function getStudentData(){
    $response = Http::withHeaders([
      'UINSU-KEY' => env('UINSU_KEY'),
    ])->post('https://ws.uinsu.ac.id/portal/OtentikasiUser', [
      'username' => '0701213127',
      'password' => 'GemscooL123',
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
