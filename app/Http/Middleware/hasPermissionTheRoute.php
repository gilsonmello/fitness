<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessParams;
use App\Model\Backend\User;
use App\Model\Backend\Permission;
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
        if(Auth::user()->hasAnyRoles('adm')){
            return $next($request);
        }
        $assets = $this->getAssets($request, $params);
        
        if (!access()->canMultiple($assets['permissions'], $assets['needsAll']))
            return $this->getRedirectMethodAndGo($request, $params);

        return $next($request);
    }
}
