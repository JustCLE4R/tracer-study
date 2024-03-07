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
      // informasi akademik
      $table->string('program_studi');
      $table->string('fakultas');
      $table->string('tingkat_pendidikan');
      $table->year('tahun_masuk');
      $table->date('tgl_lulus');
      $table->date('tgl_yudisium');
      $table->date('tgl_wisuda');
      $table->float('ipk');
      $table->integer('sks_kumulatif');
      $table->char('predikat_kelulusan', 1);
      $table->string('judul_tugas_akhir');
      // informasi pribadi
      $table->integer('nomor_ktp');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->char('jenis_kelamin', 1);
      $table->string('kewarganegaraan');
      $table->string('provinsi');
      $table->string('kabupaten');
      $table->string('alamat');
      // informasi kontak
      $table->string('telepon', 25);
      $table->string('email');
      $table->string('linkedin');
      $table->string('facebook');
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
