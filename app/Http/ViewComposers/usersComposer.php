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
            $arr=json_decode($singleUser['privilege'],true);
            array_push($privileges,$arr);
        }

        #get privileges names as array
        $names=array();
        foreach($privileges as $id=>$oneUser){
            foreach($oneUser as $name=>$singlePrivilege){

                krsort($oneUser);
                array_push($names,$name);
            }
            break;
        }
        rsort($names);
        $names=json_encode($names);

        $allUsers=users::all();
        $accountTypes=usersTypes::all();
        $view->with(compact('allUsers','accountTypes','privileges','names'));
    }

}
