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
        Schema::create('manteles', function (Blueprint $table) {
            $table->id('pk_manteles')->autoIncrement();
            $table->string('imagen_manteles', 1000);
            $table->string('color_manteles', 25);
	        $table->string('tipo_manteles', 25);
            $table->integer('cant_manteles');
            $table->smallinteger('estatus_manteles');
        });
        
        DB::table('manteles')->insert([
            'imagen_manteles' => 'sin mantel',
            'color_manteles' => 'sin mantel',             
            'tipo_manteles' => 'sin tipo manteles',             
            'cant_manteles' => 0,                            
            'estatus_manteles' => 2,                          
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manteles');
    }
};
