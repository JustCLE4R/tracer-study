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
        Schema::create('questioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            for ($i = 1; $i <= 18; $i++) {
                $table->enum('a_' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum('b_' . $i, [0, 1, 2, 3, 4]);
            }
            $table->enum('c_1', [0, 1, 2, 3]); //C
            for ($i = 1; $i <= 5; $i++) {
                $table->enum('d_' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 5; $i++) {
                $table->enum('e_' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 10; $i++) {
                $table->enum('f_' . $i, [0, 1, 2, 3, 4]);
            }
            for($i = 1; $i <= 6; $i++){
                $table->enum('g_' . $i, [0, 1, 2, 3, 4]);
            }
            $table->string('h_1');
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
        Schema::dropIfExists('questioners');
    }
};
