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
      $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
      $table->boolean('is_studying')->default(1);
      $table->string('tingkat_pendidikan', 2)->nullable();
      $table->string('program_studi')->nullable();
      $table->string('perguruan_tinggi')->nullable();
      $table->date('tgl_mulai_pendidikan')->nullable();
      $table->string('status_pendidikan')->nullable();
      $table->boolean('is_linear')->nullable();
      $table->string('negara_pendidikan')->nullable();
      $table->string('provinsi_pendidikan')->nullable();
      $table->string('kabupaten_pendidikan')->nullable();
      $table->string('bukti_pendidikan')->nullable();
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
