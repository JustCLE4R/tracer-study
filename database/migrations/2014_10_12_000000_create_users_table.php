<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('nim', 10)->unique();
      $table->string('nama');
      $table->string('password');
      $table->string('role')->default('mahasiswa');
      $table->boolean('is_bekerja')->default(1);
      // informasi akademik
      $table->string('program_studi');
      $table->string('fakultas')->nullable();
      $table->string('strata')->nullable();
      $table->year('tahun_masuk');
      $table->date('tgl_lulus')->nullable();
      $table->date('tgl_yudisium')->nullable();
      $table->date('tgl_wisuda')->nullable();
      $table->float('ipk')->nullable();
      $table->integer('sks_kumulatif')->nullable();
      $table->string('predikat_kelulusan', 17)->nullable();
      $table->string('judul_tugas_akhir')->nullable();
      // informasi pribadi
      $table->string('foto')->nullable();
      $table->unsignedBigInteger('nomor_ktp')->nullable();
      $table->string('tempat_lahir');
      $table->date('tgl_lahir');
      $table->char('jenis_kelamin', 1);
      $table->string('kewarganegaraan')->nullable();
      $table->string('provinsi')->nullable();
      $table->string('kabupaten')->nullable();
      $table->string('kecamatan')->nullable();
      $table->string('alamat');
      // informasi kontak
      $table->string('telepon', 25);
      $table->string('email');
      $table->string('linkedin')->nullable();
      $table->string('facebook')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
