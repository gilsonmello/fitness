<?php

namespace App\Http\Middleware;

use Closure;

class hasPermissionTheRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params = null)
    {
        dd($request, $params, $request->route()->getAction());
        return $next($request);
    }
}
