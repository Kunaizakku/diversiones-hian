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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('pk_inventario')->autoIncrement();
            $table->unsignedBigInteger('fk_sillas');
            $table->foreign('fk_sillas')->references('pk_sillas')->on('sillas');
            $table->unsignedBigInteger('fk_mesas');
            $table->foreign('fk_mesas')->references('pk_mesas')->on('mesas');
            $table->unsignedBigInteger('fk_brincolines');
            $table->foreign('fk_brincolines')->references('pk_brincolines')->on('brincolines');
            $table->unsignedBigInteger('fk_motores');
            $table->foreign('fk_motores')->references('pk_motores')->on('motores');
            $table->unsignedBigInteger('fk_extenciones');
            $table->foreign('fk_extenciones')->references('pk_extenciones')->on('extenciones');
            $table->unsignedBigInteger('fk_manteles');
            $table->foreign('fk_manteles')->references('pk_manteles')->on('manteles');
            $table->smallinteger('estatus_inventario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
