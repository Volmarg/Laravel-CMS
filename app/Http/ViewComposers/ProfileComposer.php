<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class ProfileComposer {

    protected $users;

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->users = array('1','2');
    }

    public function compose(View $view)
    {
        $view->with('counter', '123');
    }

}
