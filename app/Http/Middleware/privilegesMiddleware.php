<?php

namespace App\Http\Middleware;

use Closure;
use App\users;
use App\usersTypes;
use DeepCopy\f001\A;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;
use App\usersPrivilages;
class privilegesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   /*
         * This is prefix based privilege checker. Simply get prefix from uri and check
         * what is the status in DB for currently logged in user
         */

        #get page prefix - it's also set in route web.
        preg_match('#/([a-z]*)#',$_SERVER['REQUEST_URI'],$found);
        $prefix=$found[1];

        #get current user data
        $uID=auth()->user()->id;
        $privileges=usersPrivilages::select('privilege')->where('id',$uID)->get();
        $privileges=json_decode($privileges[0]->privilege,true);

        #check what is the status of privilege for current prefix
        $status=($privileges[$prefix]=='enable'?true:false);


        if($status){
            return $next($request);
        }else{
            echo '<h1>You are not allowed to enter this section</h1>';
            echo '<a href="'.url()->previous().'" ><button class="btn">Go back</button></a>';
            die();
        }

    }
}
