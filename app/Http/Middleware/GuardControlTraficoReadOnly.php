<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuardControlTraficoReadOnly
{
    private const ROLE = 'Control trafico';

    /**
     * Rutas GET que, aunque usan GET, ejecutan una acción de escritura.
     */
    private array $rutasGetBloqueadas = [
        'solicitud.create',
        'solicitud.edit',
        'vehiculo.create',
        'vehiculo.edit',
        'vehiculo.edit2',
        'solicitudes.toggleTrafico',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->hasRole(self::ROLE)) {
            return $next($request);
        }

        $path = $request->path();

        if (! str_starts_with($path, 'solicitud') && ! str_starts_with($path, 'vehiculo')) {
            return $next($request);
        }

        $routeName = $request->route()?->getName();

        if (in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'], true)) {
            if (in_array($routeName, $this->rutasGetBloqueadas, true)) {
                abort(403, 'Acción no permitida para el rol de solo lectura.');
            }

            return $next($request);
        }

        // El filtro del listado envía POST a store2, pero no modifica datos.
        if ($routeName === 'solicitud.store2') {
            return $next($request);
        }

        abort(403, 'Acción no permitida para el rol de solo lectura.');
    }
}
