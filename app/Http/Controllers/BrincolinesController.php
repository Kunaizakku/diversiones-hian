<?php

namespace App\Http\Controllers;

use \App\Models\Brincolines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para el manejo de logs

class BrincolinesController extends Controller
{
    public function insertarbrincolin(Request $request)
    {
        try {
            $brincolines = new Brincolines;

            if ($request->hasFile('imagen_brincolines')) {
                $imagen = $request->file('imagen_brincolines');
                $rutaimagen = $imagen->store('public/images');
                $brincolines->imagen_brincolines = str_replace('public/', '', $rutaimagen);
            }

            $brincolines->nombre_brincolines = $request->nombre_brincolines;
            $brincolines->cant_brincolines = $request->cant_brincolines;
            $brincolines->cat_brincolines = $request->cat_brincolines;
            $brincolines->tam_brincolines = $request->tam_brincolines;
            $brincolines->estatus_brincolines = 1;

            $brincolines->save();
            return redirect('/form_brincolines')->with('success', 'Brincolín agregado');
        } catch (\Exception $e) {
            Log::error('Error al agregar brincolín: ' . $e->getMessage()); // Registro del error
            return redirect('/form_brincolines')->with('error', 'Ocurrió un error al agregar el brincolín. Inténtalo de nuevo.');
        }
    }

    public function ver_brincolines()
    {
        $dato_brincolines = Brincolines::where('estatus_brincolines', 1)->get();

        return view('lista_brincolines', compact('dato_brincolines'));
    }


    public function editarbrincolin($pk_brincolines)
    {
        $dato_brincolines = Brincolines::find($pk_brincolines);        

        return view('editar_brincolines', compact('dato_brincolines'));
    }

    public function actualizarbrincolin(Request $request, $pk_brincolines)
    {
        $brincolines = Brincolines::find($pk_brincolines);    

        if ($request->hasFile('imagen_brincolines')) {
            $imagen = $request->file('imagen_brincolines');
            $rutaimagen = $imagen->store('public/images');
            $brincolines->imagen_brincolines = str_replace('public/', '', $rutaimagen);
        }    

        $brincolines->nombre_brincolines = $request->nombre_brincolines;
        $brincolines->cant_brincolines = $request->cant_brincolines;
        $brincolines->cat_brincolines = $request->cat_brincolines;
        $brincolines->tam_brincolines = $request->tam_brincolines;

        $brincolines->save();
        return redirect('/lista_brincolines')->with('success', 'Brincolín actualizado');
    }
}
