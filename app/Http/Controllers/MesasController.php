<?php

namespace App\Http\Controllers;
use \App\Models\Mesas;

use Illuminate\Http\Request;

class MesasController extends Controller
{
    public function insertarmesa (Request $request)
    {
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
        return redirect('/form_mesas');
}
 



}