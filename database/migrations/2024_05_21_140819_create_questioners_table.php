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
                $table->enum('a-' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum('b-' . $i, [0, 1, 2, 3, 4]);
            }
            $table->enum('c-1', [0, 1, 2, 3]); //C
            for ($i = 1; $i <= 5; $i++) {
                $table->enum('d-' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 5; $i++) {
                $table->enum('e-' . $i, [0, 1, 2, 3, 4]);
            }
            for ($i = 1; $i <= 10; $i++) {
                $table->enum('f-' . $i, [0, 1, 2, 3, 4]);
            }
            for($i = 1; $i <= 6; $i++){
                $table->enum('g-' . $i, [0, 1, 2, 3, 4]);
            }
            $table->string('h-1');
            $table->string('i-1');
            $table->string('j-1');
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
