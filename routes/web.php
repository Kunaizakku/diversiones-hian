<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;

Route::get('/', function () {
    return view('formulariosillas'); 
});

//fomulario sillas
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');
