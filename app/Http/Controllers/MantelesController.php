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

    public function ver_manteles(){
        $dato_mantel = Manteles::get();
        return view('lista_manteles', compact('dato_mantel'));
    }

    public function editarmantel($pk_manteles){
        $dato_mantel = Manteles::find($pk_manteles);

        return view('editar_manteles', compact('dato_mantel'));
    }

    public function actualizarmanteles($pk_manteles, Request $request){
        $editar_manteles = Manteles::find($pk_manteles);

        if ($request->hasFile('imagen_manteles')) {
            $imagen = $request->file('imagen_manteles');
            $rutaimagen = $imagen->store('public/images');
            $editar_manteles->imagen_manteles = str_replace('public/', '', $rutaimagen);
        }
        $editar_manteles->color_manteles = $request->color_manteles;
        $editar_manteles->cant_manteles = $request->cant_manteles;
        $editar_manteles->save();
        return redirect('/lista_manteles')->with('success', 'mantel actualizada');
    }

    public function bajamanteles($pk_manteles){
        $baja_manteles = Manteles::find($pk_manteles);
        $baja_manteles->estatus_manteles = 0;
        $baja_manteles->save();
        return redirect('/lista_manteles')->with('success', 'mantel dado de baja');
    }

    public function activarmanteles($pk_manteles){
        $baja_manteles = Manteles::find($pk_manteles);
        $baja_manteles->estatus_manteles = 1;
        $baja_manteles->save();
        return redirect('/lista_manteles')->with('success', 'mantel dado de alta');
    }
}
