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
        Schema::create('extenciones', function (Blueprint $table) {
            $table->id('pk_extenciones')->autoIncrement();
            $table->string('imagen_extenciones', 1000);
            $table->string('nombre_extenciones', 25);
            $table->integer('cant_extenciones');
            $table->smallinteger('estatus_extenciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extenciones');
    }
};