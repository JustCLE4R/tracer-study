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
        Schema::create('pekerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_bekerja')->default(1);
            $table->char('status_pekerjaan', 8)->nullable(); //part time, full time
            $table->char('kriteria_pekerjaan', 1)->nullable();
            $table->char('bidang_pekerjaan', 1)->nullable();
            $table->char('tingkat_tempat_bekerja', 1)->nullable();
            $table->char('jabatan_pekerjaan', 1)->nullable();
            $table->string('detail_pekerjaan')->nullable();
            $table->bigInteger('pendapatan')->nullable(); 
            $table->char('kesesuaian', 1)->nullable(); //kesesuaian dengan prodi
            $table->date('tgl_mulai_kerja')->nullable();
            $table->date('tgl_akhir_kerja')->nullable();
            $table->string('provinsi_kerja')->nullable();
            $table->string('kabupaten_kerja')->nullable();
            $table->string('bukti_bekerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjas');
    }
};
