<?php

namespace App\Http\Controllers;

use \App\Models\Manteles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para el manejo de logs

class MantelesController extends Controller
{
    public function insertarmanteles(Request $request)
    {
        try {
            $manteles = new Manteles;

            if ($request->hasFile('imagen_mantel')) {
                $imagen = $request->file('imagen_mantel');
                $rutaimagen = $imagen->store('public/images');
                $manteles->imagen_manteles = str_replace('public/', '', $rutaimagen);
            }

            $manteles->color_manteles = $request->color_mantel;
            $manteles->tipo_manteles = $request->tipo_mantel;
            $manteles->cant_manteles = $request->cantidad_mantel;
            $manteles->estatus_manteles = 1;

            $manteles->save();
            return redirect('/form_manteles')->with('success', 'Mantel agregado');
        } catch (\Exception $e) {
            Log::error('Error al agregar mantel: ' . $e->getMessage()); // Registro del error
            return redirect('/form_manteles')->with('error', 'Ocurrió un error al agregar el mantel. Inténtalo de nuevo.');
        }
    }
}
