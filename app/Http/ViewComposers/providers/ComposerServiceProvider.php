<?php

namespace App\Http\ViewComposers\providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider{
  public function boot(){
    View::composer('*','App\Http\ViewComposers\commonDataComposer');
  }

  public function register(){
     //
 }
}
