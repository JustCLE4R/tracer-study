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
        Schema::create('wirausahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_usaha');
            $table->char('tingkat_tempat_bekerja', 1);
            $table->char('bidang_usaha', 1);
            $table->char('jabatan', 1);
            $table->string('detail_pekerjaan');
            $table->bigInteger('omset');
            $table->bigInteger('pendapatan');   
            $table->jsonb('pemodal');
            $table->char('kesesuaian', 1); //kesesuaian dengan prodi
            $table->date('tgl_mulai_usaha');
            $table->date('tgl_akhir_usaha')->default(null)->nullable();
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
        Schema::dropIfExists('wirausahas');
    }
};
