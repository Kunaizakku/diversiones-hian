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
        Schema::create('brincolines', function (Blueprint $table) {
            $table->id('pk_brincolines')->autoIncrement();
            $table->string('imagen_brincolines', 1000);
            $table->string('nombre_brincolines', 25);
            $table->integer('cant_brincolines');
            $table->string('cat_brincolines', 25);
            $table->string('tam_brincolines', 25);
            $table->smallinteger('estatus_brincolines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brincolines');
    }
};
