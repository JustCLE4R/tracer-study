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
    // User::create([
    //   "nim" => "0701213127",
    //   "nama" => "Dimas Yudistira",
    //   "password" => Hash::make(md5('123')),
    //   'program_studi' => 'Ilmu Komputer',
    //   'fakultas' => 'Sains dan Teknologi',
    //   'strata' => fake()->randomElement(['S1', 'S2', 'S3']),
    //   'tahun_masuk' => fake()->year,
    //   'tgl_lulus' => fake()->date,
    //   'tgl_yudisium' => fake()->date,
    //   'tgl_wisuda' => fake()->date,
    //   'ipk' => fake()->randomFloat(2, 2.5, 4.0),
    //   'sks_kumulatif' => fake()->numberBetween(90, 150),
    //   'predikat_kelulusan' => fake()->randomElement(['Terpuji', 'Sangat Baik', 'Baik']),
    //   'judul_tugas_akhir' => fake()->sentence,
    //   'nomor_ktp' => fake()->unique()->randomNumber(8),
    //   'tempat_lahir' => fake()->city,
    //   'tgl_lahir' => fake()->date,
    //   'jenis_kelamin' => fake()->randomElement(['L', 'P']),
    //   'kewarganegaraan' => 'Indonesia',
    //   'provinsi' => fake()->state,
    //   'kabupaten' => fake()->city,
    //   'alamat' => fake()->address,
    //   'telepon' => fake()->phoneNumber,
    //   'email' => fake()->unique()->safeEmail,
    //   'linkedin' => 'https://www.linkedin.com/in/' . fake()->userName,
    //   'facebook' => 'https://www.facebook.com/' . fake()->userName,
    //   'remember_token' => Str::random(10),
    // ]);
    User::create([
      "nim" => "0701212165",
      "nama" => "Paris Alvito",
      "password" => Hash::make(md5('123')),
      'program_studi' => 'Ilmu Komputer',
      'fakultas' => 'Sains dan Teknologi',
      'strata' => fake()->randomElement(['S1', 'S2', 'S3']),
      'tahun_masuk' => fake()->year,
      'tgl_lulus' => fake()->date,
      'tgl_yudisium' => fake()->date,
      'tgl_wisuda' => fake()->date,
      'ipk' => fake()->randomFloat(2, 2.5, 4.0),
      'sks_kumulatif' => fake()->numberBetween(90, 150),
      'predikat_kelulusan' => fake()->randomElement(['Terpuji', 'Sangat Baik', 'Baik']),
      'judul_tugas_akhir' => fake()->sentence,
      'nomor_ktp' => fake()->unique()->randomNumber(8),
      'tempat_lahir' => fake()->city,
      'tgl_lahir' => fake()->date,
      'jenis_kelamin' => fake()->randomElement(['L', 'P']),
      'kewarganegaraan' => 'Indonesia',
      'provinsi' => fake()->state,
      'kabupaten' => fake()->city,
      'alamat' => fake()->address,
      'telepon' => fake()->phoneNumber,
      'email' => fake()->unique()->safeEmail,
      'linkedin' => 'https://www.linkedin.com/in/' . fake()->userName,
      'facebook' => 'https://www.facebook.com/' . fake()->userName,
      'remember_token' => Str::random(10),
    ]);
    User::factory(5)->create();

    User::create([
      "nim" => "0700000000",
      "nama" => "Admin Saintek",
      "password" => Hash::make(md5('123')),
      "role" => 'admin',
      'program_studi' => '-',
      'fakultas' => 'Sains dan Teknologi',
      'tahun_masuk' => fake()->year,
      'tempat_lahir' => '-',
      'tgl_lahir' => fake()->date,
      'jenis_kelamin' => 'L',
      'kewarganegaraan' => 'Indonesia',
      'telepon' => '0888888888',
      'email' => 'saintek@uinsu.ac.id',
      'remember_token' => Str::random(10),
      'alamat' => fake()->address,
    ]);

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
}
