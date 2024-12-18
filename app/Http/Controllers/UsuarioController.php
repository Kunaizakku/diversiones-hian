<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /* Inserción de datos */
    public function insertar(Request $req) {
        $validated = $req->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|unique:usuario,usuario|max:255',
            'contrasena' => 'required|string|min:8',
        ]);
    
        $usuario = new Usuario();
        $usuario->nombre = $req->nombre;
        $usuario->usuario = $req->usuario;
        $usuario->contrasena = Hash::make($req->contrasena);
        $usuario->estatus_usuario = 1;
        $usuario->save();
    
        return redirect()->back()->with('success', 'Usuario agregado');
    }
    

    public function login(Request $request) {
        $nombre = $request->input('usuario');
        $contraseña = $request->input('contrasena');

        $usuario = Usuario::where('usuario', $nombre)->first();

        if ($usuario && Hash::check($contraseña, $usuario->contrasena)) {
            // Verificar si el estatus del usuario es 0
            if ($usuario->estatus_usuario == 0) {
                return redirect()->to('/')
                    ->with('error_status', 'Tu cuenta está desactivada. Contacta al administrador.');
            }

            // Establecer las variables de sesión
            session([
                'id' => $usuario->pk_usuario,
                'nombre' => $usuario->usuario,
                'estatus' => $usuario->estatus_usuario
            ]);

            return redirect()->to('/inicio')->with('success', '¡Bienvenido(a) ' . $usuario->usuario);
        } else {
            return redirect()->to('/')
                ->with('error_credentials', 'Usuario o contraseña incorrectos')
                ->with('error_retry', 'Inicie sesión Para ingresar')
                ->with('use_js_alerts', true);
        }
    }

    public function logout() {
        Auth::logout(); 
        session()->flush(); // Cierra la sesión del usuario
        return redirect('/')->with('success', 'Sesión cerrada');
    }

    private function buscar($usuario, $contrasena) {
        $usuario = Usuario::where('usuario', $usuario)
            ->first();
    
        if ($usuario && Hash::check($contrasena, $usuario->contrasena)) {
            return $usuario;
        } else {
            return null;
        }
    }

    public function detalle_usuario() {
        $usuarios = Usuario::all();
        return view('lista_empleado', compact('usuarios'));
    }


    public function bajausuarios($pk_usuario){
        $baja_usuario = Usuario::find($pk_usuario);
        $baja_usuario->estatus_usuario = 0;
        $baja_usuario->save();
        return redirect('/lista_usuario')->with('success', 'Empleado dado de baja');
    }

    public function activarusuarios($pk_usuario){
        $baja_usuario = Usuario::find($pk_usuario);
        $baja_usuario->estatus_usuario = 1;
        $baja_usuario->save();
        return redirect('/lista_usuario')->with('success', 'Empelado dado de alta');
    }

    public function editarusuario($pk_usuario){
        $dato_usuario = Usuario::find($pk_usuario);

        return view('editar_usuario', compact('dato_usuario'));
    }

    public function actualizarusuario($pk_usuario, Request $request){
        $editar_usuario = Usuario::find($pk_usuario);

        $editar_usuario->nombre = $request->nombre;
        $editar_usuario->usuario = $request->usuario;
        $editar_usuario->save();
        return redirect('/lista_usuario')->with('success', 'Usuario actualizada');
    }
}
