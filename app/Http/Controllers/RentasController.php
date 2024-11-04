<?php

namespace App\Http\Controllers;

use App\Models\Rentas;
use App\Models\Sillas;
use App\Models\Mesas;
use App\Models\Manteles;
use App\Models\Brincolines;
use App\Models\Motores;
use App\Models\Extenciones;

use Illuminate\Http\Request;

class RentasController extends Controller
{
    ///////////Esta funcion es para que en los select de el "form_renta" se muestre la informacion///////////////
    public function datosdeinventario()
    {
        $opcion_sillas = Sillas::whereIn('estatus_sillas', [1, 2])->get();//RECUERDA EL "WHERE IN" PARA MULTIPLES VALORES EN ESTE CASO 1 Y 2
        $opcion_mesas = Mesas::whereIn('estatus_mesas', [1, 2])->get();
        $opcion_manteles = Manteles::whereIn('estatus_manteles', [1, 2])->get();
        $opcion_brincolines = Brincolines::whereIn('estatus_brincolines', [1, 2])->get();
        $opcion_motores = Motores::whereIn('estatus_motores', [1, 2])->get();
        $opcion_extenciones = Extenciones::whereIn('estatus_extenciones', [1, 2])->get();

        return view('form_rentas', compact('opcion_sillas', 'opcion_mesas', 'opcion_manteles', 'opcion_brincolines', 'opcion_motores', 'opcion_extenciones'));
    }

    public function insertarrentas(Request $request)
    {
        try {
        // Validar los datos del formulario (opcional)
        $request->validate([
            'fecha_entrega' => 'required|date',
            'celular' => 'required|string',
            'direccion' => 'required|string',
            // Agregar más reglas de validación según sea necesario
        ]);

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
        $rentas->fk_motores = $request->input('fk_motores');
        $rentas->fk_extenciones = $request->input('fk_extenciones');
        $rentas->estatus_renta = 1; // O lo que corresponda

        // $rentas->save();
        // return redirect('/form_rentas')->with('success', 'Renta registrada con éxito');
        
        // Guardar en la base de datos

            $rentas->save();
            return redirect('/form_rentas')->with('success', 'Renta registrada con éxito');
        } catch (\Exception $e) {
            return redirect('/form_rentas')->with('error', 'Error al registrar la renta: ' . $e->getMessage());
        }
    }

    public function ver_renta($pk_rentas)
    {
        $ver_renta = Rentas::find($pk_rentas);

        if (!$ver_renta) {
            return redirect('/rentas')->with('error', 'Renta no encontrada');
        }

        $dato_renta = Rentas::join('sillas', 'sillas.pk_sillas', '=', 'rentas.fk_sillas')
            ->join('mesas', 'mesas.pk_mesas', '=', 'rentas.fk_mesas')
            ->join('manteles', 'manteles.pk_manteles', '=', 'rentas.fk_manteles')
            ->join('brincolines', 'brincolines.pk_brincolines', '=', 'rentas.fk_brincolines')
            ->join('motores', 'motores.pk_motores', '=', 'rentas.fk_motores')
            ->join('extenciones', 'extenciones.pk_extenciones', '=', 'rentas.fk_extenciones')
            ->where('rentas.pk_rentas', '=', $pk_rentas)
            ->where('rentas.estatus_renta', '=', 1)
            ->first();

        return view('ver_renta', compact('ver_renta', 'dato_renta'));
    }

    public function verRentasCalendario($pk_rentas)
    {
        try {
            $rentas = Rentas::whereDate('fecha_entrega', $pk_rentas)->get();
            return response()->json($rentas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener rentas: ' . $e->getMessage()], 500);
        }
    }
}
