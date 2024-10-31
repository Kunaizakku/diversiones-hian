<?php

namespace App\Http\Controllers;

use \App\Models\Mesas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para el manejo de logs

class MesasController extends Controller
{
    public function insertarmesa(Request $request)
    {
        try {
            $mesas = new Mesas;

            if ($request->hasFile('imagen_mesa')) {
                $imagen = $request->file('imagen_mesa');
                $rutaimagen = $imagen->store('public/images');
                $mesas->imagen_mesas = str_replace('public/', '', $rutaimagen);
            }

            $mesas->forma_mesas = $request->forma_mesas;
            $mesas->cant_mesas = $request->cant_mesas;
            $mesas->audiencia_mesas = $request->audiencia_mesas;
            $mesas->estatus_mesas = 1;

            $mesas->save();
            return redirect('/form_mesas')->with('success', 'Mesa agregada');
        } catch (\Exception $e) {
            Log::error('Error al agregar mesa: ' . $e->getMessage()); // Registro del error
            return redirect('/form_mesas')->with('error', 'Ocurrió un error al agregar la mesa. Inténtalo de nuevo.'); 
        }
    }
}
