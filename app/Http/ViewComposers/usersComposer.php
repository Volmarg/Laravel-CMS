<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\users;
use App\usersTypes;
use App\usersPrivilages;

class usersComposer {


    public function compose(View $view)
    {

        $dbJsonPrivilege=usersPrivilages::select('privilege')->get();
        $privileges=array();

        foreach($dbJsonPrivilege as $singleUser){
            array_push($privileges,json_decode($singleUser['privilege']));
        }



        $allUsers=users::all();
        $accountTypes=usersTypes::all();
        $view->with(compact('allUsers','accountTypes','privileges'));
    }

}
