<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  /**
   * The current password being used by the factory.
   */
  protected static ?string $password;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'nim' => fake()->numberBetween(1000000000, 9999999999),
      'nama' => fake()->name(),
      'password' => static::$password ??= Hash::make(md5('password')),
      'program_studi' => 'Ilmu Komputer',
      'fakultas' => fake()->randomElement(['Sains dan Teknologi', 'Ushuluddin dan Studi Islam', 'Ekonomi dan Bisnis Islam']),
      'strata' => fake()->randomElement(['S1', 'S2', 'S3']),
      'tahun_masuk' => fake()->year,
      'tgl_lulus' => fake()->date,
      'tgl_yudisium' => fake()->date,
      'tgl_wisuda' => fake()->date,
      'ipk' => fake()->randomFloat(2, 2.5, 4.0),
      'sks_kumulatif' => fake()->numberBetween(90, 150),
      'predikat_kelulusan' => fake()->randomElement(['Terpuji', 'Sangat Baik', 'Baik']),
      'judul_tugas_akhir' => fake()->sentence,
      'foto' => fake()->imageUrl(640, 480, 'people', true),
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
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn (array $attributes) => [
      'email_verified_at' => null,
    ]);
  }
}
