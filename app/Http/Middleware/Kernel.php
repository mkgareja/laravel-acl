<?php

namespace App\Http\Middleware;

use Closure;

class Kernel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'role' => \Bican\Roles\Middleware\VerifyRole::class,
    'permission' => \Bican\Roles\Middleware\VerifyPermission::class,
    'level' => \Bican\Roles\Middleware\VerifyLevel::class,
    ];
}
