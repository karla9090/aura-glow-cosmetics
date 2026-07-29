<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si no ha iniciado sesión o su rol no es admin, lo mandamos al catálogo con un mensaje
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}