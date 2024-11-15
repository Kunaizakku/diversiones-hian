<?php

namespace App\Http\Controllers;

use App\Models\Sillas;
use Illuminate\Http\Request;

class SillasController extends Controller
{
    public function insertarsilla(Request $request)
    {
        $sillas = new Sillas;

        try {
            if ($request->hasFile('imagen_silla')) {
                $imagen = $request->file('imagen_silla');
                $rutaimagen = $imagen->store('public/images'); 
                $sillas->imagen_sillas = str_replace('public/', '', $rutaimagen);
            }

            $sillas->forma_sillas = $request->forma_sillas;
            $sillas->cant_sillas = $request->cant_sillas;
            $sillas->audiencia_sillas = $request->audiencia_sillas;
            $sillas->estatus_sillas = 1;

            $sillas->save();
            return redirect('/form_sillas')->with('success', 'Silla agregada');
        } catch (\Exception $e) {
            return redirect('/form_sillas')->with('error', 'Error al agregar la silla: ' . $e->getMessage());
        }
    }

    public function ver_sillas()
    {
        $dato_sillas = Sillas::whereIn('estatus_sillas', [1,0])->get();
        return view('lista_sillas', compact('dato_sillas'));
    }

    public function editarsilla($pk_sillas){
        $dato_sillas = Sillas::find($pk_sillas);

        return view('editar_sillas', compact('dato_sillas'));
    }

    public function actualizarsilla(Request $request, $pk_sillas){
        $editar_sillas = Sillas::find($pk_sillas);


        if ($request->hasFile('imagen_silla')) {
            $imagen = $request->file('imagen_silla');
            $rutaimagen = $imagen->store('public/images'); 
            $editar_sillas->imagen_sillas = str_replace('public/', '', $rutaimagen);
        }

        $editar_sillas->forma_sillas = $request->forma_sillas;
        $editar_sillas->cant_sillas = $request->cant_sillas;
        $editar_sillas->audiencia_sillas = $request->audiencia_sillas;

        $editar_sillas->save(); 
        return redirect('/lista_sillas')->with('success', 'Silla actualizada');
    }


    public function bajasillas($pk_sillas){
        $baja_sillas = Sillas::find($pk_sillas);
        $baja_sillas->estatus_sillas = 0;
        $baja_sillas->save();
        return redirect('/lista_sillas')->with('success', 'Silla dado de baja');
    }

    public function activarsillas($pk_sillas){
        $baja_sillas = Sillas::find($pk_sillas);
        $baja_sillas->estatus_sillas = 1;
        $baja_sillas->save();
        return redirect('/lista_sillas')->with('success', 'Silla dado de alta');
    }


}
