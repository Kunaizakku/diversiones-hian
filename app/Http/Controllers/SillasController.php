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
}
