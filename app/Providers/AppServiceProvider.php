<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; 
use App\Http\Middleware\VerificarSesion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Registrar el middleware a nivel de ruta
        Route::middleware('web')
            ->group(function () {
                // Aquí puedes agregar el middleware directamente
                Route::middleware([VerificarSesion::class])->group(function () {
                    // Tus rutas protegidas por VerificarSesion
                    Route::get('/inicio', function () {
                        return view('index');
                    })->name('inicio');
                });
            });
    }
}
