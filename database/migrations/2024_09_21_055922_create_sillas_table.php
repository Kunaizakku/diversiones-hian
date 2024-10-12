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
        Schema::create('sillas', function (Blueprint $table) {
            $table->id('pk_sillas')->autoIncrement();
            $table->string('imagen_sillas', 1000);
            $table->string('forma_sillas', 25);
            $table->integer('cant_sillas');
            $table->string('audiencia_sillas', 25);
            $table->smallinteger('estatus_sillas');
        });

        DB::table('sillas')->insert([
            'imagen_sillas' => 'sin silla',
            'forma_sillas' => 'sin silla',             
            'cant_sillas' => 0,     
            'audiencia_sillas' => 'sin audiencia silla',  
            'estatus_sillas' => 2,                          
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sillas');
    }
};
