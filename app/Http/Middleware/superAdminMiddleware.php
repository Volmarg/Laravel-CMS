<?php

namespace App\Http\Middleware;

use Closure;
use App\users;
use App\usersTypes;

class superAdminMiddleware
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
        $user=auth()->user()->accountType;
        if($user=="superAdmin"){
            return $next($request);
        }else{
            dd("Invalid user");
        }


    }
}
