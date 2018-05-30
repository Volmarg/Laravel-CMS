<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\users;
use App\usersTypes;
use App\usersPrivilages;

class usersComposer {


    public function compose(View $view)
    {
        #create array out of database json
        $dbJsonPrivilege=usersPrivilages::select('privilege')->get();
        $privileges=array();

        foreach($dbJsonPrivilege as $singleUser){
            array_push($privileges,json_decode($singleUser['privilege']));
        }

        #get privileges names as array
        $names=array();
        foreach($privileges as $id=>$oneUser){
            foreach($oneUser as $name=>$singlePrivilege){
                array_push($names,$name);
            }
            break;
        }
        $names=json_encode($names);

        $allUsers=users::all();
        $accountTypes=usersTypes::all();
        $view->with(compact('allUsers','accountTypes','privileges','names'));
    }

}
