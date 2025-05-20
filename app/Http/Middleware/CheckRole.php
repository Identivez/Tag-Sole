<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Maneja una solicitud entrante y verifica si el usuario tiene el rol requerido.
     *
     * Este middleware comprueba si el usuario autenticado tiene asignado
     * el rol especificado en los parámetros de la ruta. Si el usuario no está
     * autenticado o no tiene el rol requerido, se le deniega el acceso.
     *
     * @param  \Illuminate\Http\Request  $request  La solicitud HTTP
     * @param  \Closure  $next  El siguiente middleware en la cadena
     * @param  string  $role  El rol requerido para acceder a la ruta
     * @return mixed  La respuesta procesada o un error 403
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verificar si el usuario está autenticado y tiene el rol requerido
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Si no tiene permisos, mostrar error 403 (Forbidden)
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        // Si el usuario tiene el rol requerido, continuar con la solicitud
        return $next($request);
    }
}
