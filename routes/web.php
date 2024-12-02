<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SillasController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\BrincolinesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExtencionesController;
use App\Http\Controllers\MantelesController;
use App\Http\Controllers\RentasController;
use App\Http\Controllers\MotoresController;
use App\Models\Motores;
use App\Models\Usuario;
use App\Http\Middleware\VerificarSesion;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::middleware(['web', VerificarSesion::class])->group(function () {

    Route::get('/inicio', function () {
        return view('index');
    })->name('inicio') ;



//sillas
Route::get('/form_sillas', function () {
    return view('form_sillas'); // Aquí se retorna la vista
})->name('form_sillas');
Route::post('/formulariosillas', [SillasController::class, 'insertarsilla'])->name('silla.insertarsilla');
Route::get('/lista_sillas', [SillasController::class, 'ver_sillas'])->name('silla.listasillas');
Route::get('/editar_sillas/{pk_sillas}', [SillasController::class, 'editarsilla'])->name('silla.editarsilla');
Route::post('/actualizarsillas/{pk_sillas}', [SillasController::class, 'actualizarsilla'])->name('silla.actualizarsilla');
Route::get('/bajasillas/{pk_sillas}', [SillasController::class, 'bajasillas'])->name('silla.bajasillas');
Route::get('/activarsillas/{pk_sillas}', [SillasController::class, 'activarsillas'])->name('silla.activarsillas');


//mesas
Route::get('/form_mesas', function () {
    return view('form_mesas'); // Aquí se retorna la vista
})->name('form_mesas');
Route::post('/formulariomesas', [MesasController::class, 'insertarmesa'])->name('mesa.insertarmesa');
Route::get('/lista_mesas', [MesasController::class, 'ver_mesas'])->name('mesa.listamesas');
Route::get('/editar_mesas/{pk_mesas}', [MesasController::class, 'editarmesa'])->name('mesa.editarmesa');
Route::post('/actualizarmesas/{pk_mesas}', [MesasController::class, 'actualizarmesa'])->name('mesa.actualizarmesa');
Route::get('/bajamesas/{pk_mesas}', [MesasController::class, 'bajamesas'])->name('mesa.bajamesas');
Route::get('/activarmesas/{pk_mesas}', [MesasController::class, 'activarmesas'])->name('mesa.activarmesas');

//brincolines
Route::get('/form_brincolines', function () {
    return view('form_brincolines'); // Aquí se retorna la vista
})->name('form_brincolines');
Route::post('/formulariobrincolines', [BrincolinesController::class, 'insertarbrincolin'])->name('brincolin.insertarbrincolin');
Route::get('/lista_brincolines', [BrincolinesController::class, 'ver_brincolines'])->name('brincolin.listabrincolines');
Route::get('/editar_brincolines/{pk_brincolines}', [BrincolinesController::class, 'editarbrincolin'])->name('brincolin.editarbrincolin');
Route::post('/actualizarbrincolines/{pk_brincolines}', [BrincolinesController::class, 'actualizarbrincolin'])->name('brincolin.actualizarbrincolin');
Route::get('/bajabrincolines/{pk_brincolines}', [BrincolinesController::class, 'bajabrincolines'])->name('brincolin.bajabrincolines');
Route::get('/activarbrincolines/{pk_brincolines}', [BrincolinesController::class, 'activarbrincolines'])->name('brincolin.activarbrincolines');

// Extenciones
Route::get('/form_extenciones', function () {
    return view('form_extenciones');
})->name('form_extenciones');
// Route::post('/formularioextenciones', [ExtencionesController::class, 'insertarextenciones'])->name('extencion.insertarextenciones');
Route::post('/sincronizar', [ExtencionesController::class, 'sincronizar'])->name('extencion.sincronizar');
Route::get('/lista_extenciones', [ExtencionesController::class, 'ver_extenciones'])->name('extencion.listaextenciones');
Route::get('/editar_extenciones/{pk_extenciones}', [ExtencionesController::class, 'editarextencion'])->name('extencion.editarextencion');
Route::post('/actualizarextenciones/{pk_extenciones}', [ExtencionesController::class, 'actualizarextencion'])->name('extencion.actualizarextencion');
Route::get('/bajaextenciones/{pk_extenciones}', [ExtencionesController::class, 'bajaextenciones'])->name('extencion.bajaextenciones');
Route::get('/activarextenciones/{pk_extenciones}', [ExtencionesController::class, 'activarextenciones'])->name('extencion.activarextenciones');

// Manteles
Route::get('/form_manteles', function () { return view('form_manteles'); })->name('form_manteles');
Route::post('/formulariomanteles', [MantelesController::class, 'insertarmanteles'])->name('mantel.insertarmanteles');
Route::get('/lista_manteles', [MantelesController::class, 'ver_manteles'])->name('mantel.listamanteles');
Route::get('/editar_manteles/{pk_manteles}', [MantelesController::class, 'editarmantel'])->name('mantel.editarmantel');
Route::post('/actualizarmanteles/{pk_manteles}', [MantelesController::class, 'actualizarmanteles'])->name('mantel.actualizarmantel');
Route::get('/bajamanteles/{pk_manteles}', [MantelesController::class, 'bajamanteles'])->name('mantel.bajamanteles');
Route::get('/activarmanteles/{pk_manteles}', [MantelesController::class, 'activarmanteles'])->name('mantel.activarmanteles');

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
Route::get('/lista_rentas_inactivas', [RentasController::class, 'ver_rentasLista_inactivas'])->name('renta.listarentas_inactivas');
Route::get('/editar_rentas/{pk_rentas}', [RentasController::class, 'editarrenta'])->name('renta.editarrenta');
Route::post('/actualizarrentas/{pk_rentas}', [RentasController::class, 'actualizarrenta'])->name('renta.actualizarrenta');
Route::get('/bajarentas/{pk_rentas}', [RentasController::class, 'bajarentas'])->name('renta.bajarentas');
Route::get('/activarrentas/{pk_rentas}', [RentasController::class, 'activarrentas'])->name('renta.activarrentas');

// Motores
Route::get('/form_motores', function () { return view('form_motores'); })->name('form_motores');
Route::post('/formulariomotores', [MotoresController::class, 'insertarmotor'])->name('motor.insertarmotor');
Route::get('/lista_motores', [MotoresController::class, 'ver_motores'])->name('motor.listamotores');
Route::get('/editar_motores/{pk_motores}', [MotoresController::class, 'editarmotor'])->name('motor.editarmotor');
Route::post('/actualizarmotores/{pk_motores}', [MotoresController::class, 'actualizarmotores'])->name('motor.actualizarmotor');
Route::get('/bajamotores/{pk_motores}', [MotoresController::class, 'bajamotores'])->name('motor.bajamotores');
Route::get('/activarmotores/{pk_motores}', [MotoresController::class, 'activarmotores'])->name('motor.activarmotores');


//usuario/login
Route::get('/registro', function () {
        return view('registro');
})->name('registro');
Route::post('/registroUsuario', [UsuarioController::class, 'insertar'])->name('usuario.insertar');
Route::match(['get', 'post'], '/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
Route::get('/lista_usuario', [UsuarioController::class,'detalle_usuario'])->name('detalle_usuario');

Route::get('/bajausuarios/{pk_usuario}', [UsuarioController::class, 'bajausuarios'])->name('usuario.bajausuarios');
Route::get('/activarusuarios/{pk_usuario}', [UsuarioController::class, 'activarusuarios'])->name('usuario.activarusuarios');
Route::get('/editar_usuario/{pk_usuario}', [UsuarioController::class, 'editarusuario'])->name('usuario.editar');
Route::post('/actualizarusuario/{pk_usuario}', [UsuarioController::class, 'actualizarusuario'])->name('usuario.actualizar');

}); 


/////pruebas



