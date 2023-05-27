<?php
namespace App\Http\Middleware;
use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->rol_id === 2) {
            return $next($request);
        }

        return abort(403); // Acceso no autorizado
    }
}