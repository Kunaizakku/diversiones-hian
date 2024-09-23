<?php

namespace App\Http\Controllers;
use \App\Models\Brincolines;

use Illuminate\Http\Request;

class BrincolinesController extends Controller
{
    public function insertarbrincolin (Request $request) {

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
        return redirect('/brincolines');
    }
}
