<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Career;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      "nim" => "superadmin",
      "nama" => "Super Admin",
      "password" => Hash::make(md5('123')),
      "role" => 'superadmin',
      'program_studi' => '-',
      'fakultas' => '-',
      'tahun_masuk' => fake()->year,
      'tempat_lahir' => '-',
      'tgl_lahir' => fake()->date,
      'jenis_kelamin' => 'L',
      'kewarganegaraan' => 'Indonesia',
      'telepon' => '0888888888',
      'email' => 'admin@uinsu.ac.id',
      'remember_token' => Str::random(10),
      'alamat' => fake()->address,
    ]);

    User::create([
      "nim" => "superadmin2",
      "nama" => "Super Admin 2",
      "password" => Hash::make(md5('123')),
      "role" => 'superadmin2',
      'program_studi' => '-',
      'fakultas' => '-',
      'tahun_masuk' => fake()->year,
      'tempat_lahir' => '-',
      'tgl_lahir' => fake()->date,
      'jenis_kelamin' => 'L',
      'kewarganegaraan' => 'Indonesia',
      'telepon' => '0888888888',
      'email' => 'admin@uinsu.ac.id',
      'remember_token' => Str::random(10),
      'alamat' => fake()->address,
    ]);

    $this->call(AdminSeeder::class);

    $filePath = storage_path('json/questionSeeder.json');

    if(file_exists($filePath)){
      $rawData = json_decode(file_get_contents($filePath), true);
      foreach($rawData as $data){
        Question::create([
          'question' => $data['question'],
          'qanswer' => json_encode($data['qanswer']),
          'category' => $data['category'],
          'type' => $data['type']
        ]);
      };
    }
  }
}
