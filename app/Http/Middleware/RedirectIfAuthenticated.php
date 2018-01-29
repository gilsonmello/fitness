<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Services\Access\Traits\AccessParams;

class RedirectIfAuthenticated
{
    use AccessParams;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, $params = null)
    {
        $url = $request->route()->uri();
        if(strpos(route('auth.logout'), $url) !== FALSE){
            return $next($request);
        }

        if(!Auth::guest()) {
            return redirect()->route('backend.dashboard');
        }

        return $next($request);
    }
}
