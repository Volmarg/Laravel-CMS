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
        #Todo: checkout why $type var is cousing errors
        //if($type=='SuperAdmin'){
            $user=auth()->user()->accountType;
            if($user=="superAdmin"){
                return $next($request);
            }else{
                dd("Invalid user");
            }
        //}

        return 'Error! User type missing. ??';

    }
}
