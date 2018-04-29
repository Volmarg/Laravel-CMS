<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class TestViewComposer{

  var $variable='';

  public function __construct()
  {
      // Dependencies automatically resolved by service container...
      $this->variable = 'var';
  }



  public function compose(View $view){
    $view->with('var','$this->variable');
  }
}
