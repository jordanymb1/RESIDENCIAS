<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Las rutas que deberían ser excluidas de la verificación CSRF.
     *
     * @var array
     */
    protected $except = [
        'api/*', // Excluir todas las rutas de API de la verificación CSRF
        'sanctum/csrf-cookie', // Esta es la ruta necesaria para obtener el token CSRF (solo si estás usando Sanctum)
    ];
}
