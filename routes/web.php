<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\BrincolinesController;

//cambio cada rato este para pruebas, antes de que exista un index
Route::get('/', function () {
    return view('formulariobrincolines'); 
});

//fomulario sillas
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');

//fomulario mesas
Route::post('/formulariomesas', [MesasController::class, 'insertarmesa'])->name('mesa.insertarmesa');

//fomulario brincolines
Route::post('/formulariobrincolines', [BrincolinesController::class, 'insertarbrincolin'])->name('brincolin.insertarbrincolin');
