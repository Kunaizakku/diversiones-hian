<?php

namespace App\Http\Controllers;

use App\Models\Motores;
use Illuminate\Http\Request;

class MotoresController extends Controller
{
    public function insertarmotor(Request $request)
    {
        $sillas = new Motores();

        try {
            if ($request->hasFile('imagen_motor')) {
                $imagen = $request->file('imagen_motor');
                $rutaimagen = $imagen->store('public/images'); 
                $sillas->imagen_motores = str_replace('public/', '', $rutaimagen);
            }

            $sillas->color_motores = $request->color_motor;
            $sillas->cant_motores = $request->cant_motor;
            $sillas->estatus_motores = 1;

            $sillas->save();
            return redirect('/form_motores')->with('success', 'Motor agregado');
        } catch (\Exception $e) {
            return redirect('/form_motores')->with('error', 'Error al agregar el motor: ' . $e->getMessage());
        }
    }


    public function ver_motores(){
        $dato_motor = Motores::get();
        return view('lista_motores', compact('dato_motor'));
    }

    public function editarmotor($pk_motores){
        $dato_motor = Motores::find($pk_motores);

        return view('editar_motores', compact('dato_motor'));
    }

    public function actualizarmotores($pk_motores, Request $request){
        $editar_motores = Motores::find($pk_motores);

        if ($request->hasFile('imagen_motores')) {
            $imagen = $request->file('imagen_motores');
            $rutaimagen = $imagen->store('public/images');
            $editar_motores->imagen_motores = str_replace('public/', '', $rutaimagen);
        }
        $editar_motores->color_motores = $request->color_motores;
        $editar_motores->cant_motores = $request->cant_motores;
        $editar_motores->save();
        return redirect('/lista_motores')->with('success', 'Motor actualizada');
    }

    public function bajamotores($pk_motores){
        $baja_motores = Motores::find($pk_motores);
        $baja_motores->estatus_motores = 0;
        $baja_motores->save();
        return redirect('/lista_motores')->with('success', 'Motor dado de baja');
    }

    public function activarmotores($pk_motores){
        $baja_motores = Motores::find($pk_motores);
        $baja_motores->estatus_motores = 1;
        $baja_motores->save();
        return redirect('/lista_motores')->with('success', 'Motor dado de alta');
    }

}
