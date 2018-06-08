<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\usersTypes;
use Gate;
use Request as facadeRequest;
use App\usersPrivilages;
use App\Http\Controllers\UsersPrivilegesController;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

      return view('auth/users/view');

    }

    public function removeUser($name,Users $users, usersPrivilages $privileges_){
        $id=$users->id($name);     #get user id
        $privileges_->remove($id); #remove record from privileges
        $users->remove($name);     #remove record from users

        return back();
    }

    public function changeUserType(Request $request, users $users_, UsersPrivilegesController $privilegesController,usersPrivilages $privileges_eloq,requestsController $requestsController){


    #first get the data sent from form
      $allUsersInputs=$request->all();
      $filteredSelects=$requestsController->filterInputsName($allUsersInputs,'accountType-select-');

      foreach($filteredSelects as $key => $oneRequest){

    #set roles for all users
          $users_->updateAccountType($key,$oneRequest);

    #set default privileges for given uer type
          $id=$users_->id($key)[0]['id'];    #get user ID

          $privs=$privilegesController->defaultRolePrivileges($oneRequest);#getPrivileges for that role
          $privileges_eloq->updateRoleBasedPrivilege($id,$privs); #setPrivileges for that role
      }

      return back();
    }

    public function changeUserPrivileges(usersPrivilages $privileges_eloq,UsersPrivilegesController $privilegesController){

        #This returns arrays of settings for users
        $allUsersJson=$privilegesController->jsonPrivilegesGenerator();
        $parsedSettings=json_decode($allUsersJson,true);

        #now create single json for each users. Since returned on/off options are split between arrays they need to me merged
        $stringNames=preg_replace('#["\[\]]#','',$_POST['privNames']);
        $names=explode(',',$stringNames);
        $counted=count($names);  #for checking how many elements are in given on/off array
        $merged=array();         #created by merging off & on arrays
        $skip=false;             #for skipping foreach iteration
        $updateIterator=1;       #for database updating

        foreach($parsedSettings as $id=>$one){
            if($skip==true){ #For merging 2 arrays into json and skipping next iteration
                $skip=false;
                continue;
            };

            #go over the arrays that need to be merged
            #check if this one array is smaller than it should be
            if(count($one)!=$counted){
                $skip=true;

                foreach ($one as $name=> $option){
                    $merged[$name]=$option;
                }
                foreach ($parsedSettings[$id+1] as $name=> $option){
                    $merged[$name]=$option;
                }

                krsort($merged,SORT_STRING );
                $singleJson=json_encode($merged);

            }else{ #for case with normal arrays - full sized
                $skip=false;
                krsort($one,SORT_STRING );
                $singleJson=json_encode($one);

            }
            $privileges_eloq->updatePrivilege($updateIterator,$singleJson);
            $updateIterator++;
        }
        return back();
    }

    public function showPrivilege(){

        return view('auth.users.usersPrivilege');
    }


    public function settingsPanel(){


        return view('auth.users.profileEdit');
    }

    public function userOptions(Request $request, users $users_){

        $users_->updateUserProfile(Auth()->user()->id,$_POST);
        return back();
    }

}
