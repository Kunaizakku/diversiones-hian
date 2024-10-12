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
            // $table->unsignedBigInteger('fk_inventario');
            // $table->foreign('fk_inventario')->references('pk_inventario')->on('inventario');
            $table->unsignedBigInteger('fk_sillas');
            $table->foreign('fk_sillas')->references('pk_sillas')->on('sillas');
            $table->integer('cant_sillas_renta')->nullable();
            $table->string('audiencia_sillas_renta', 100)->nullable();

            $table->unsignedBigInteger('fk_mesas');
            $table->foreign('fk_mesas')->references('pk_mesas')->on('mesas');
            $table->integer('cant_mesas_renta')->nullable();
            $table->string('audiencia_mesas_renta', 100)->nullable();

            $table->unsignedBigInteger('fk_manteles');
            $table->foreign('fk_manteles')->references('pk_manteles')->on('manteles');
            $table->integer('cant_manteles_renta')->nullable();
            $table->string('tipo_manteles_renta', 100)->nullable();

            $table->unsignedBigInteger('fk_brincolines');
            $table->foreign('fk_brincolines')->references('pk_brincolines')->on('brincolines');
            $table->string('cat_brincolines_renta', 100)->nullable();
            $table->string('tam_brincolines_renta', 100)->nullable();

            $table->unsignedBigInteger('fk_motores');
            $table->foreign('fk_motores')->references('pk_motores')->on('motores');

            $table->unsignedBigInteger('fk_extenciones');
            $table->foreign('fk_extenciones')->references('pk_extenciones')->on('extenciones');

            $table->smallinteger('estatus_renta');
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
