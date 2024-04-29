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
            $table->boolean('is_active')->default(1);
            $table->char('status_pekerjaan', 8); //part time, full time
            $table->char('kriteria_pekerjaan', 1);
            $table->char('bidang_pekerjaan', 1);
            $table->char('tingkat_tempat_bekerja', 1);
            $table->char('jabatan_pekerjaan', 1);
            $table->string('detail_pekerjaan');
            $table->bigInteger('pendapatan'); 
            $table->char('kesesuaian', 1); //kesesuaian dengan prodi
            $table->date('tgl_mulai_kerja');
            $table->date('tgl_akhir_kerja')->default(null)->nullable();
            $table->string('provinsi_kerja');
            $table->string('kabupaten_kerja');
            // $table->string('alamat_kerja');
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
