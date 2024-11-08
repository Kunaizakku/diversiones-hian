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

    public function ver_mesas(){
        $dato_mesas = Mesas::where('estatus_mesas', 1)->get();
        return view('lista_mesas', compact('dato_mesas'));
    }


    public function editarmesa($pk_mesas){
        $dato_mesas = Mesas::find($pk_mesas);

        return view('editar_mesas', compact('dato_mesas'));
    }

    public function actualizarmesa(Request $request, $pk_mesas){
        $editar_mesas = Mesas::find($pk_mesas);

        if ($request->hasFile('imagen_mesa')) {
            $imagen = $request->file('imagen_mesa');
            $rutaimagen = $imagen->store('public/images'); 
            $editar_mesas->imagen_mesas = str_replace('public/', '', $rutaimagen);
        }

        $editar_mesas->forma_mesas = $request->forma_mesas;
        $editar_mesas->cant_mesas = $request->cant_mesas;
        $editar_mesas->audiencia_mesas = $request->audiencia_mesas;

        $editar_mesas->save();
        
        return redirect('/lista_mesas')->with('success', 'Mesa actualizada');
    }
}
