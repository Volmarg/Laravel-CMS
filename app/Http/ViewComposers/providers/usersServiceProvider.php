<?php

namespace App\Http\ViewComposers\providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class usersServiceProvider extends ServiceProvider{
    public function boot(){
        View::composer('*','App\Http\ViewComposers\usersComposer');
    }

    public function register(){
        //
    }
}
