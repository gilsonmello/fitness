<?php

namespace App\Http\Middleware;

use Closure;
//use App\Services\Access\Traits\AccessParams;
//use App\Model\Backend\User;
//use App\Model\Backend\Permission;
use Auth;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Auth\Access\AuthorizationException;

class hasPermissionTheRoute
{

    //use AccessParams;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params = null)
    {
        //Verificando se o usuário está logado
        //Caso esteja, verifica se ele possue permissão ao backend
        if(!Auth::guest()) {
            Gate::authorize('backend.view');/*
            if(!Gate::check('backend.view')){
                throw new AuthorizationException('This action is unauthorized.');
            }*/
        }

        if(Auth::guest()) {
            return redirect()->route('auth.login');
        }

        /*
        $assets = $this->getAssets($request, $params);
        
        if (!access()->canMultiple($assets['permissions'], $assets['needsAll']))
            return $this->getRedirectMethodAndGo($request, $params);*/

        return $next($request);
    }
}
