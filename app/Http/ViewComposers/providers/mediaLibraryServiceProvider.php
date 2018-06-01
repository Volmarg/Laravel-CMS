<?php
/**
 * Created by PhpStorm.
 * User: Volmarg
 * Date: 01.06.2018
 * Time: 15:15
 */

namespace App\Http\ViewComposers\providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class mediaLibraryServiceProvider extends ServiceProvider
{
    //TODO: limit views for which this is accessible
    public function boot(){
        View::composer('*','App\Http\ViewComposers\mediaLibraryViewComposer');
    }

    public function register(){
        //
    }

}