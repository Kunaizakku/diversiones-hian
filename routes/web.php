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
    return view('login');
})->name('login');

Route::get('/inicio', function () {
        return view('index');
})->name('inicio');

//sillas
Route::get('/form_sillas', function () {
    return view('form_sillas'); // Aquí se retorna la vista
})->name('form_sillas');
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');

Route::get('/lista_sillas', [SillasController::class, 'ver_sillas'])->name('silla.listasillas');

Route::get('/editar_sillas/{pk_sillas}', [SillasController::class, 'editarsilla'])->name('silla.editarsilla');

Route::post('/actualizarsillas/{pk_sillas}', [SillasController::class, 'actualizarsilla'])->name('silla.actualizarsilla');

//mesas
Route::get('/form_mesas', function () {
    return view('form_mesas'); // Aquí se retorna la vista
})->name('form_mesas');
Route::post('/formulariomesas', [MesasController::class, 'insertarmesa'])->name('mesa.insertarmesa');

Route::get('/lista_mesas', [MesasController::class, 'ver_mesas'])->name('mesa.listamesas');

Route::get('/editar_mesas/{pk_mesas}', [MesasController::class, 'editarmesa'])->name('mesa.editarmesa');

Route::post('/actualizarmesas/{pk_mesas}', [MesasController::class, 'actualizarmesa'])->name('mesa.actualizarmesa');

//brincolines
Route::get('/form_brincolines', function () {
    return view('form_brincolines'); // Aquí se retorna la vista
})->name('form_brincolines');
Route::post('/formulariobrincolines', [BrincolinesController::class, 'insertarbrincolin'])->name('brincolin.insertarbrincolin');

Route::get('/lista_brincolines', [BrincolinesController::class, 'ver_brincolines'])->name('brincolin.listabrincolines');

Route::get('/editar_brincolines/{pk_brincolines}', [BrincolinesController::class, 'editarbrincolin'])->name('brincolin.editarbrincolin');

Route::post('/actualizarbrincolines/{pk_brincolines}', [BrincolinesController::class, 'actualizarbrincolin'])->name('brincolin.actualizarbrincolin');

// Extenciones
Route::get('/form_extenciones', function () {
    return view('form_extenciones');
})->name('form_extenciones');
Route::post('/formularioextenciones', [ExtencionesController::class, 'insertarextenciones'])->name('extencion.insertarextenciones');

Route::get('/lista_extenciones', [ExtencionesController::class, 'ver_extenciones'])->name('extencion.listaextenciones');

Route::get('/editar_extenciones/{pk_extenciones}', [ExtencionesController::class, 'editarextencion'])->name('extencion.editarextencion');

Route::post('/actualizarextenciones/{pk_extenciones}', [ExtencionesController::class, 'actualizarextencion'])->name('extencion.actualizarextencion');

// Manteles
Route::get('/form_manteles', function () {
    return view('form_manteles');
})->name('form_manteles');
Route::post('/formulariomanteles', [MantelesController::class, 'insertarmanteles'])->name('mantel.insertarmanteles');

Route::get('/lista_manteles', function () {
    return view('lista_manteles'); // Aquí se retorna la vista
})->name('lista_manteles');

// Rentas

//esto de "vista" es la variable definida en el controlador para poder usarlo en otras vistas la consulta
//Route::get('/nombre de la ruta/{variable creada en la funcion en el controlador}', [RentasController::class, 'nombre de misma funcion'])->name('alias');
Route::get('/form_renta/{vista}', [RentasController::class, 'datosdeinventario'])->name('form_renta');

Route::post('insertarrentas', [RentasController::class, 'insertarrentas'])->name('renta.insertarrentas');     

Route::get('/lista_rentas', function () {
    return view('lista_rentas'); // Aquí se retorna la vista
})->name('lista_rentas');

Route::get('/get-rentas/{pk_rentas}', [RentasController::class, 'verRentasCalendario']);

Route::get('/renta/{pk_rentas}', [RentasController::class, 'ver_renta'])->name('renta.ver_renta');

Route::get('/lista_rentas', [RentasController::class, 'ver_rentasLista'])->name('renta.listarentas');

Route::get('/editar_rentas/{pk_rentas}', [RentasController::class, 'editarrenta'])->name('renta.editarrenta');


Route::post('/actualizarrentas/{pk_rentas}', [RentasController::class, 'actualizarrenta'])->name('renta.actualizarrenta');


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



