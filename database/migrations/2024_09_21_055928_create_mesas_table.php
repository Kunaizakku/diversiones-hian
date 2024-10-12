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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('pk_mesas')->autoIncrement();
            $table->string('imagen_mesas', 1000);
            $table->string('forma_mesas', 25);
            $table->integer('cant_mesas');
            $table->string('audiencia_mesas', 25);
            $table->smallinteger('estatus_mesas');
        });

        DB::table('mesas')->insert([
            'imagen_mesas' => 'sin mesa',
            'forma_mesas' => 'sin mesa',             
            'cant_mesas' => 0,     
            'audiencia_mesas' => 'sin audiencia mesa',  
            'estatus_mesas' => 2,                          
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
