<?php

namespace App\Http\Controllers;
use \App\Models\Extenciones;

use Illuminate\Http\Request;

class ExtencionesController extends Controller
{
    public function insertarextenciones (Request $request) {

        $extenciones = new Extenciones;

        if ($request->hasFile('imagen_extenciones')) {
            $imagen = $request->file('imagen_extenciones');
            $rutaimagen = $imagen->store('public/images');
            $extenciones->imagen_extenciones = str_replace('public/', '', $rutaimagen);
        }

        $extenciones->nombre_extenciones = $request->nombre_extenciones;
        $extenciones->cant_extenciones = $request->cant_extenciones;
        $extenciones->estatus_extenciones = 1;

        $extenciones->save();
        return redirect('/form_extenciones');
    }
}
