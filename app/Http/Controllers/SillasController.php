<?php

namespace App\Http\Controllers;
use \App\Models\Sillas;

use Illuminate\Http\Request;

class SillasController extends Controller
{
    public function insertarsilla(request $request)
    {
        $sillas = new Sillas;

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
    }
}
