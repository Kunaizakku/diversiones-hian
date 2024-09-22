<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;
use App\Http\Controllers\MesasController;

Route::get('/', function () {
    return view('formulariomesas'); 
});

//fomulario sillas
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');

//fomulario mesas
Route::post('/formulariomesas', [MesasController::class, 'insertarmesa'])->name('mesa.insertarmesa');
