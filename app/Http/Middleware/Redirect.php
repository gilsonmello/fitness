<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 16/09/2017
 * Time: 21:33
 */

namespace App\Http\Middleware;
use Closure;


class Redirect
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
        return $next($request);
    }
}