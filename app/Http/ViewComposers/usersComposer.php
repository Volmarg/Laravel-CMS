<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\users;
use App\usersTypes;

class usersComposer {


    public function compose(View $view)
    {
        $allUsers=users::all();
        $accountTypes=usersTypes::all();
        $view->with(compact('allUsers','accountTypes'));
    }

}
