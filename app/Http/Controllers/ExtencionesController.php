<?php

namespace App\Http\Controllers;

use \App\Models\Extenciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para el manejo de logs

class ExtencionesController extends Controller
{
    public function insertarextenciones(Request $request)
    {
        try {
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
            return redirect('/form_extenciones')->with('success', 'Extensión agregada');
        } catch (\Exception $e) {
            Log::error('Error al agregar extensión: ' . $e->getMessage()); // Registro del error
            return redirect('/form_extenciones')->with('error', 'Ocurrió un error al agregar la extensión. Inténtalo de nuevo.');
        }
    }

    public function ver_extenciones(){
        $dato_extensiones = Extenciones::whereIn('estatus_extenciones', [1, 0])->get();
        return view('lista_extenciones', compact('dato_extensiones'));
    }


    public function editarextencion($pk_extenciones){
        $dato_extenciones = Extenciones::find($pk_extenciones);
        return view('editar_extenciones', compact('dato_extenciones'));
    }                

    public function actualizarextencion($pk_extenciones, Request $request){
        $editar_extenciones = Extenciones::find($pk_extenciones);

        if ($request->hasFile('imagen_extenciones')) {
            $imagen = $request->file('imagen_extenciones');
            $rutaimagen = $imagen->store('public/images');
            $editar_extenciones->imagen_extenciones = str_replace('public/', '', $rutaimagen);
        }
        $editar_extenciones->nombre_extenciones = $request->nombre_extenciones;
        $editar_extenciones->cant_extenciones = $request->cant_extenciones;
        $editar_extenciones->save();
        return redirect('/lista_extenciones')->with('success', 'Extensión actualizada');
    }
    
    public function bajaextenciones($pk_extenciones){
        $baja_extenciones = Extenciones::find($pk_extenciones);
        $baja_extenciones->estatus_extenciones = 0;
        $baja_extenciones->save();
        return redirect('/lista_extenciones')->with('success', 'Extensión dado de baja');
    }
 
    public function activarextenciones($pk_extenciones){
        $baja_extenciones = Extenciones::find($pk_extenciones);
        $baja_extenciones->estatus_extenciones = 1;
        $baja_extenciones->save();
        return redirect('/lista_extenciones')->with('success', 'Extensión dado de alta');
    }

}
