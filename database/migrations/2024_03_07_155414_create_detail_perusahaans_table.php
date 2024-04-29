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
    Schema::create('detail_perusahaans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('pekerja_id')->constrained('pekerjas')->onDelete('cascade');
      $table->string('nama_perusahaan');
      $table->string('nama_atasan');
      $table->string('jabatan_atasan');
      $table->string('telepon_atasan', 15);
      $table->string('alamat_perusahaan');
      $table->string('email_atasan');
      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('detail_perusahaans');
  }
};
