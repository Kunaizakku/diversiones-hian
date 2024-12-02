<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

$request = Request::capture();
$data = $request->json()->all();

$nombre_extenciones = $data['nombre_extenciones'];
$imagen_extenciones = $data['imagen_extenciones'];
$cant_extenciones = $data['cant_extenciones'];

try {
    DB::table('extenciones')->insert([
        'nombre_extenciones' => $nombre_extenciones,
        'imagen_extenciones' => $imagen_extenciones,
        'cant_extenciones' => $cant_extenciones,
        'estatus' => 1
    ]);
    echo json_encode(['status' => 'success']);
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

?>
