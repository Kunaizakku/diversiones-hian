<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;
use App\Http\Controllers\MesasController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', function () {
    $PK_USUARIO = session('pk_usuario');
    if ($PK_USUARIO) {
        return redirect()->back()->with('warning', 'Ya has iniciado sesión');
    }
    return view('login');
})->name('login');

Route::get('/registro', function () {
    $PK_USUARIO = session('pk_usuario');
    if ($PK_USUARIO) {
        return redirect()->back()->with('warning', 'Cierra sesión para acceder');
    } else {
        return view('registro');
    }
})->name('registro');

Route::get('/form_sillas', function () {
    return view('form_sillas'); // Aquí se retorna la vista
})->name('form_sillas');

Route::get('/form_mesas', function () {
    return view('form_mesas'); // Aquí se retorna la vista
})->name('form_mesas');
