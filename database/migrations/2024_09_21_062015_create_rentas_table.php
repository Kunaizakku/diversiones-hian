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
        Schema::create('rentas', function (Blueprint $table) {
            $table->id('pk_rentas')->autoIncrement();
            $table->datetime('fecha_entrega');
            $table->integer('celular');
            $table->string('direccion', 100);
            $table->integer('costo');
            $table->unsignedBigInteger('fk_inventario');
            $table->foreign('fk_inventario')->references('pk_inventario')->on('inventario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentas');
    }
};
