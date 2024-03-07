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
            $table->foreignId('user_id');
            $table->string('status_pekerjaan'); //part time, full time
            $table->string('kriteria_pekerjaan');
            $table->string('bidang_usaha', 1);
            $table->string('tingkat_tempat_bekerja', 13);
            $table->string('jabatan');
            $table->string('detail_pekerjaan');
            $table->bigInteger('pendapatan'); 
            $table->string('kesesuaian', 6); //kesesuaian dengan prodi
            $table->date('tgl_mulai_kerja');
            $table->date('tgl_akhir_kerja')->default(null)->nullable();
            $table->string('provinsi_kerja');
            $table->string('kabupaten_kerja');
            $table->string('bukti_bekerja');
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
