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
    {

        #TODO: create users privileges upon account registrations
        /*
         * This is prefix based privilege checker. Simply get prefix from uri and check
         * what is the status in DB for currently logged in user
         */
        #vars
        $block=false;            #used to defined if access to this page should be limited

        preg_match('#/([a-z]*)#',$_SERVER['REQUEST_URI'],$found);
        #get page prefix - it's also set in route web.
        $prefix=$found[1];

        #return $next($request);
        if(auth()->user()==null
            || $prefix==''){
            //nobody is logged in
            //no prefix was found in url/ no prefix match in db
            return $next($request);
        }elseif(Auth()->user()->accountType=='suspended'){ #check if status is set as suspeneded

            return redirect('/errorsHandler')->with(['type'=>'suspended']);
        }else

        #get current user data
        $uID=auth()->user()->id;
        $privileges=usersPrivilages::select('privilege')->where('users_id',$uID)->get();
        $privileges=json_decode($privileges[0]->privilege,true);

        //current prefix has no privileges settings
        if(!array_key_exists($prefix,$privileges)){
            return $next($request);
        }

        #check if this prefix has disabled status
        foreach($privileges as $onePrivil_){
            if($privileges[$prefix]=='disabled'){
                $block=true;
                break;
            }
        }


        if($block){ // current url is blocked

            echo '<h1>You are not allowed to enter this section</h1>';
            echo '<a href="'.url()->previous().'" ><button class="btn">Go back</button></a>';
            die();
        }else{  //current url is not blocked
            return $next($request);
        }


    }
}
