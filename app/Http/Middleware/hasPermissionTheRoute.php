<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessParams;
use App\User;
use App\Permission;
use Auth;

class hasPermissionTheRoute
{

    use AccessParams;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params = null)
    {
        if(Auth::guest()) {
            return redirect()->route('auth.login');
        }
        $assets = $this->getAssets($request, $params);
        if (!access()->canMultiple($assets['permissions'], $assets['needsAll']))
            return $this->getRedirectMethodAndGo($request, $params);

        return $next($request);
    }
}
