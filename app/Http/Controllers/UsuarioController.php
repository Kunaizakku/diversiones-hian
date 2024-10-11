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
            if ($usuario->estatus_usuario == 0) {
                // Redirigir al usuario con un mensaje de cuenta desactivada
                return redirect()->to('/')
                    ->with('error_status', 'Tu cuenta está desactivada. Contacta al administrador.');
            }

            // Establecer las variables de sesión
            session([
                'id' => $usuario->pk_usuario,
                'nombre' => $usuario->usuario,
                'contraseña' => $contraseña,
                'estatus' => $usuario->estatus_usuario
            ]);

            // Redirigir al usuario con un mensaje de bienvenida basado en el rol
            if ($usuario->estatus_usuario == 2) {
                return redirect()->to('/')->with('success', '¡Bienvenido(a)!');
            } elseif ($usuario->estatus_usuario == 1) {
                return redirect()->to('/')->with('success', 'Bienvenido(a): ' . $usuario->usuario);
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect()->to('/iniciarsesion')
                ->with('error_credentials', 'Usuario o contraseña incorrectos')
                ->with('error_retry', 'Introduzca sus datos de nuevo')
                ->with('use_js_alerts', true);
        }
    }

    public function logout() {
        Auth::logout(); 
        session()->flush();// Cierra la sesión del usuario
        return redirect('/')->with('success', 'Sesión cerrada'); // Redirige a la página de inicio de sesión u otra página de tu elección
    }

    private function buscar($usuario, $contrasena)
    {
        $usuario = Usuario::where('usuario', $usuario)
            ->where('estatus_usuario', 1)
            ->first();
    
        if ($usuario && $contrasena == $usuario->contrasena) {
            return $usuario;
        } else {
            return null;
        }
    }

    public function detalle_usuario()
    {
        $usuarios = Usuario::all();
        return view('lista_empleado', compact('usuarios'));
    }

}
