<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarSesion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!session()->has('id') && $request->route()->getName() !== 'login') {
            return redirect()->route('login'); 
        }   

        if (session()->has('id') && $request->route()->getName() === 'login') {
            return redirect()->route('inicio'); 
        }

        return $next($request);
    }
}

