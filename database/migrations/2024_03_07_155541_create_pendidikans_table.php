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
    Schema::create('pendidikans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->string('tingkat_pendidikan', 2);
      $table->string('program_studi');
      $table->string('perguruan_tinggi');
      $table->date('tgl_mulai_pendidikan');
      $table->string('status_pendidikan');
      $table->boolean('is_linear');
      $table->string('negara_pendidikan');
      $table->string('provinsi_pendidikan');
      $table->string('kabupaten_pendidikan');
      $table->string('bukti_pendidikan');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pendidikans');
  }
};
