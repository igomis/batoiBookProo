<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Comprova si l'usuari està autenticat i és administrador
        if (Auth::check() && Auth::user()->administrador) {
            return $next($request);
        }

        // Redirigeix a una ruta o mostra un error si no és administrador
        return redirect('/dashboard')->with('missatge', 'No tens permisos per accedir a aquesta secció');
    }
}
