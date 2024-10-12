<?php

namespace App\Http\Controllers;

use App\Models\Rentas;

use Illuminate\Http\Request;

class RentasController extends Controller
{
    public function insertarrentas(Request $request)
    {
        // Crear una nueva instancia de Renta y asignar los valores del formulario
        $rentas = new Rentas();
        $rentas->fecha_entrega = $request->input('fecha_entrega');
        $rentas->celular = $request->input('celular');
        $rentas->direccion = $request->input('direccion');
        $rentas->costo = $request->input('costo');
        $rentas->fk_sillas = $request->input('fk_sillas');
        $rentas->cant_sillas_renta = $request->input('cant_sillas_renta');
        $rentas->audiencia_sillas_renta = $request->input('audiencia_sillas_renta');
        $rentas->fk_mesas = $request->input('fk_mesas');
        $rentas->cant_mesas_renta = $request->input('cant_mesas_renta');
        $rentas->audiencia_mesas_renta = $request->input('audiencia_mesas_renta');
        $rentas->fk_manteles = $request->input('fk_manteles');
        $rentas->cant_manteles_renta = $request->input('cant_manteles_renta');
        $rentas->tipo_manteles_renta = $request->input('tipo_manteles_renta');
        $rentas->fk_brincolines = $request->input('fk_brincolines');
        $rentas->cat_brincolines_renta = $request->input('cat_brincolines_renta');
        $rentas->tam_brincolines_renta = $request->input('tam_brincolines_renta');
        $rentas->fk_motores = $request->input('fk_motores');
        $rentas->fk_extenciones = $request->input('fk_extenciones');
        $rentas->estatus_renta = 1; // O lo que corresponda

        // Guardar en la base de datos
        $rentas->save();

        // Redireccionar o devolver respuesta
        return redirect('/form_rentas')->with('success', 'Rnta registrada agregada');
    }
}
