<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\BrincolinesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExtencionesController;
use App\Http\Controllers\MantelesController;
use App\Http\Controllers\RentasController;
use App\Models\Usuario;

Route::get('/', function () {
    return view('index');
})->name('index');


//sillas
Route::get('/form_sillas', function () {
    return view('form_sillas'); // Aquí se retorna la vista
})->name('form_sillas');
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');

Route::get('/lista_sillas', function () {
    return view('lista_sillas'); // Aquí se retorna la vista
})->name('lista_sillas');

//mesas
Route::get('/form_mesas', function () {
    return view('form_mesas'); // Aquí se retorna la vista
})->name('form_mesas');
Route::post('/formulariomesas', [MesasController::class, 'insertarmesa'])->name('mesa.insertarmesa');

Route::get('/lista_mesas', function () {
    return view('lista_mesas'); // Aquí se retorna la vista
})->name('lista_mesas');

//brincolines
Route::get('/form_brincolines', function () {
    return view('form_brincolines'); // Aquí se retorna la vista
})->name('form_brincolines');
Route::post('/formulariobrincolines', [BrincolinesController::class, 'insertarbrincolin'])->name('brincolin.insertarbrincolin');

Route::get('/lista_brincolines', function () {
    return view('lista_brincolines'); // Aquí se retorna la vista
})->name('lista_brincolines');

// Extenciones
Route::get('/form_extenciones', function () {
    return view('form_extenciones');
})->name('form_extenciones');
Route::post('/formularioextenciones', [ExtencionesController::class, 'insertarextenciones'])->name('extencion.insertarextenciones');

Route::get('/lista_extenciones', function () {
    return view('lista_extenciones'); // Aquí se retorna la vista
})->name('lista_extenciones');

// Manteles
Route::get('/form_manteles', function () {
    return view('form_manteles');
})->name('form_manteles');
Route::post('/formulariomanteles', [MantelesController::class, 'insertarmanteles'])->name('mantel.insertarmanteles');

Route::get('/lista_manteles', function () {
    return view('lista_manteles'); // Aquí se retorna la vista
})->name('lista_manteles');

// Rentas
Route::get('/form_rentas', function () {
    return view('form_rentas');
})->name('form_rentas');
Route::post('insertarrentas', [RentasController::class, 'insertarrentas'])->name('renta.insertarrentas');

Route::get('/lista_rentas', function () {
    return view('lista_rentas'); // Aquí se retorna la vista
})->name('lista_rentas');



//usuario/login
Route::get('/iniciarsesion', function () {
    return view('login');
})->name('iniciarsesion');

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

// Route::get('/lista_empleados', function () {
//     return view('lista_empleado');
// })->name('lista_empleados');

Route::post('/registroUsuario', [UsuarioController::class, 'insertar'])->name('usuario.insertar');

Route::match(['get', 'post'], '/login', [UsuarioController::class, 'login'])->name('usuario.login');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/lista_usuario', [UsuarioController::class,'detalle_usuario'])->name('detalle_usuario');


/////pruebas
Route::get('/get-rentas/{pk_rentas}', [RentasController::class, 'getRentas']);


