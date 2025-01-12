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
        Schema::create('questioner_stake_holders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_perusahaan_id')->constrained('detail_perusahaans')->onDelete('cascade');

            $table->jsonb('c_1');
            $table->jsonb('d_1');

            for($i = 1; $i <= 18; $i++) {
                $table->enum('e_' . $i, [0, 1, 2, 3, 4]);
            }
            for($i = 1; $i <= 18; $i++) {
                $table->enum('f_' . $i, [0, 1, 2, 3, 4]);
            }

            $table->string('g_1');
            $table->string('i_1');
            $table->string('j_1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questioner_stake_holders');
    }
};
