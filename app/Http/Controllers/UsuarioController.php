<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    
    /* inserción de datos */
    public function insertar(Request $req){
        $usuario= new Usuario();
        
        $usuario->nombre = $req->nombre;
        $usuario->usuario = $req->usuario;
        $usuario->contrasena = $req->contrasena;
        $usuario->estatus_usuario = 1;

        $usuario->save();

        return redirect()->back();

    }

    public function login(Request $request)
    {
        $nombre = $request->input('usuario');
        $contraseña = $request->input('contrasena');

        $usuario = $this->buscar($nombre, $contraseña);

        if ($usuario) {
            // Verificar si el estatus del usuario es 0
            if ($usuario->estatus == 0) {
                // Redirigir al usuario con un mensaje de cuenta desactivada
                return redirect()->to('/iniciarsesion')
                    ->with('error_status', 'Tu cuenta está desactivada. Contacta al administrador.');
            }

            // Establecer las variables de sesión
            session([
                'id' => $usuario->id,
                'nombre' => $usuario->username,
                'contraseña' => $contraseña,
                'rol' => $usuario->rol
            ]);

            // Redirigir al usuario con un mensaje de bienvenida basado en el rol
            if ($usuario->rol == 1) {
                return redirect()->to('/')->with('success', '¡Bienvenido(a)!');
            } elseif ($usuario->rol == 2) {
                return redirect()->to('/')->with('success', 'Bienvenido(a): ' . $usuario->username);
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect()->to('/iniciarsesion')
                ->with('error_credentials', 'Usuario o contraseña incorrectos')
                ->with('error_retry', 'Introduzca sus datos de nuevo')
                ->with('use_js_alerts', true);
        }
    }

}
