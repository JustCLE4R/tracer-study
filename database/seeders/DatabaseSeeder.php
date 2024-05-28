<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Career;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      "nim" => "0000000000",
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
    $this->createAdmin('0100000000', 'Admin FUSI', md5('123'), 'Ushuluddin dan Studi Islam', 'fusi@uinsu.ac.id', '0888888888');
    $this->createAdmin('0200000000', 'Admin FEBI', md5('123'), 'Ekonomi dan Bisnis Islam', 'febi@uinsu.ac.id', '0888888888');
    $this->createAdmin('0300000000', 'Admin FDK', md5('123'), 'Dakwah dan Komunikasi', 'fdk@uinsu.ac.id', '0888888888');
    $this->createAdmin('0400000000', 'Admin FSH', md5('123'), 'Syariah dan Hukum', 'fsh@uinsu.ac.id', '0888888888');
    $this->createAdmin('0500000000', 'Admin FITK', md5('123'), 'Ilmu Tarbiyah dan Keguruan', 'fitk@uinsu.ac.id', '0888888888');
    $this->createAdmin('0600000000', 'Admin FIS', md5('123'), 'Ilmu Sosial', 'fis@uinsu.ac.id', '0888888888');
    $this->createAdmin('0700000000', 'Admin Saintek', md5('123'), 'Sains dan Teknologi', 'saintek@uinsu.ac.id', '0888888888');
    $this->createAdmin('0800000000', 'Admin FKM', md5('123'), 'Kesehatan Masyarakat', 'fkm@uinsu.ac.id', '0888888888');
    $this->createAdmin('0900000000', 'Admin Pascasarjana', md5('123'), 'Pascasarjana', 'pascasarjana@uinsu.ac.id', '0888888888');


    User::factory(100)->create();
    Career::factory(1354)->create();


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


  public function createAdmin(string $nim, string $nama, string $password, string $fakultas, string $email, string $telepon): void
  {
    User::create([
        "nim" => $nim,
        "nama" => $nama,
        "password" => Hash::make($password),
        "role" => 'admin',
        'program_studi' => '-',
        'fakultas' => $fakultas,
        'tahun_masuk' => fake()->year,
        'tempat_lahir' => '-',
        'tgl_lahir' => fake()->date,
        'jenis_kelamin' => 'L',
        'kewarganegaraan' => 'Indonesia',
        'telepon' => $telepon,
        'email' => $email,
        'remember_token' => Str::random(10),
        'alamat' => fake()->address,
    ]);
  }
}
