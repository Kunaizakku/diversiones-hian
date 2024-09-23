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
        Schema::create('motores', function (Blueprint $table) {
            $table->id('pk_motores')->autoIncrement();
            $table->string('imagen_motores', 1000);
            $table->string('color_motores', 25);
            $table->integer('cant_motores');
            $table->smallinteger('estatus_motores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motores');
    }
};
