<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Load and decode JSON
        $filePath = public_path('json/fakultas.json');
        $fakultasData = json_decode(file_get_contents($filePath), true);

        $admins = []; // Array to collect all admin records

        foreach ($fakultasData as $fakultas => $programStudiArray) {
            // Add a main admin for the faculty to the array
            $admins[] = $this->prepareAdmin(
                $this->generateNim($fakultas), 
                "Admin " . $fakultas, 
                '123', 
                'adminfakultas', 
                '-', 
                $fakultas, 
                strtolower(str_replace(' ', '', $fakultas)) . "@uinsu.ac.id", 
                '0888888888'
            );

            foreach ($programStudiArray as $prodi) {
                // Add admin for each program studi to the array
                $admins[] = $this->prepareAdmin(
                    $this->generateNim($prodi), 
                    "Admin " . $prodi, 
                    '123', 
                    'adminprodi', 
                    $prodi, 
                    $fakultas, 
                    strtolower(str_replace(' ', '', $prodi)) . "@uinsu.ac.id", 
                    '0888888888'
                );
            }
        }

        // Perform bulk insert
        User::insert($admins);
    }

    private function prepareAdmin(string $nim, string $nama, string $password, string $role, string $prodi, string $fakultas, string $email, string $telepon): array
    {
        return [
            "nim" => $nim,
            "nama" => $nama,
            "password" => Hash::make(md5($password)), // Hash the password
            "role" => $role,
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
            'alamat' => "Jl. William Iskandar Ps. V, Medan Estate, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371",
            'created_at' => now(), // Set timestamps
            'updated_at' => now(),
        ];
    }

    private function generateNim(string $name): string
    {
        // Generate a slug of the name and truncate it to ensure the NIM is not too long
        $slug = substr(strtolower(Str::slug($name)), 0, 10);
        return $slug . rand(1000, 9999);
    }
}
