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
        Schema::create('cert_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('profile_check')->default(false);
            // $table->boolean('pendidikan_check')->default(false);
            // $table->boolean('pekerjaan_check')->default(false);
            $table->boolean('perjalanan_karir_check')->default(false);
            $table->boolean('questioner_check')->default(false);
            $table->string('qr_code')->nullable();
            $table->string('qr_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cert_checks');
    }
};
