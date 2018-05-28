<?php

namespace App\Http\Middleware;

use Closure;
use App\users;
use App\usersTypes;
use function PHPSTORM_META\type;

class rolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$type)
    {
        $user=auth()->user()->accountType;

        if($type=='superAdmin' && $user=="superAdmin"){
            return $next($request);
        }elseif($type=='admin' && $user=="admin"){
            return $next($request);
        }elseif($type=='normal' && $user=="normal"){
            return $next($request);
        }else{
            return back();
        }


    }
}
