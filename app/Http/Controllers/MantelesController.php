<?php

namespace App\Http\Controllers;
use \App\Models\Manteles;


use Illuminate\Http\Request;

class MantelesController extends Controller
{
    public function insertarmanteles (Request $request) {
-
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
        return redirect('/form_manteles')->with('success', 'Extensión agregada');
        
    }
}
