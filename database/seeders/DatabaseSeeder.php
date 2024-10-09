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
    $this->createAdmin('adminfusi', 'Admin FUSI', md5('123'), 'adminfakultas', '-', 'Ushuluddin dan Studi Islam', 'fusi@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfebi', 'Admin FEBI', md5('123'), 'adminfakultas', '-', 'Ekonomi dan Bisnis Islam', 'febi@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfdk', 'Admin FDK', md5('123'), 'adminfakultas', '-', 'Dakwah dan Komunikasi', 'fdk@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfsh', 'Admin FSH', md5('123'), 'adminfakultas', '-', 'Syariah dan Hukum', 'fsh@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfitk', 'Admin FITK', md5('123'), 'adminfakultas', '-', 'Ilmu Tarbiyah dan Keguruan', 'fitk@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfis', 'Admin FIS', md5('123'), 'adminfakultas', '-', 'Ilmu Sosial', 'fis@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminsaintek', 'Admin Saintek', md5('123'), 'adminfakultas', '-', 'Sains dan Teknologi', 'saintek@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminfkm', 'Admin FKM', md5('123'), 'adminfakultas', '-', 'Kesehatan Masyarakat', 'fkm@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminpasca', 'Admin Pascasarjana', md5('123'), 'adminfakultas', '-', 'Pascasarjana', 'pascasarjana@uinsu.ac.id', '0888888888');

    $this->createAdmin('adminilkomp', 'Admin Ilkomp', md5('123'), 'adminprodi', 'Ilmu Komputer', 'Sains dan Teknologi', 'ilkomp@uinsu.ac.id', '0888888888');
    $this->createAdmin('adminsi', 'Admin SI', md5('123'), 'adminprodi', 'Sistem Informasi', 'Sains dan Teknologi', 'si@uinsu.ac.id', '0888888888');


    // User::factory(100)->create();
    // Career::factory(1354)->create();


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


  public function createAdmin(string $nim, string $nama, string $password, string $admin, string $prodi, string $fakultas, string $email, string $telepon): void
  {
    User::create([
        "nim" => $nim,
        "nama" => $nama,
        "password" => Hash::make($password),
        "role" => $admin,
        'program_studi' => $prodi,
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
