<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\usersTypes;
use Gate;
use Request as facadeRequest;
class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

      return view('auth/users/view');

    }

    public function removeUser($sluger){

        users::where('name',$sluger)->delete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function changeUserType(Request $request){

    #TO DO
      # prevent from chaning self privilages and other users on same level?

    #first get the data sent from form
      $allUsersInputs=$request->all();
      $filteredSelects=$this->filterInputsName($allUsersInputs,'accountType-select-');


      foreach($filteredSelects as $key => $oneRequest){
    #now set privilages for all users
        users::where('name',$key)->update(['accountType'=>$oneRequest]);
      }

      return redirect($_SERVER['HTTP_REFERER']);
    }

    public function changeUserPrivileges(Request $request){

        $allUsersJson=$this->jsonPrivilegesGenerator();
        #$parsedSettings=json_decode($allUsersJson);

        dd($allUsersJson);


        return back();
    }

    private function jsonPrivilegesGenerator(){
        #prepare counters for iterations
        $json='{';
        //all users
        $x=0;
        $usersSize=0;

        foreach($_POST as $postName=>$singleUser){
            if(strstr($postName,'pivilege')){
                //$len+=count($singleUser);
                $usersSize++;
            }
        }


        #start iterating over all result post
        foreach($_POST as $postName=>$singleUser){

            $i=0;
            if(strstr($postName,'pivilegeSingle')){#for checked checkboxes
                $json.='"'.$x.'":{';
                foreach($singleUser as $name=>$value){
                    $len=count($singleUser)-1;
                    if($singleUser[$name]=='on'){
                        $json.='"'.$name.'"'.':'.'"on"';
                    }

                    if($i<$len){
                        $json.=',';
                    }
                    $i++;
                }#for checkboxes that have been unchecked
            }elseif(strstr($postName,'pivilegeOffSingle')){
                $json.='"'.$x.'":{';
                foreach($singleUser as $name=>$value){
                    $len=count($singleUser)-1;
                    if($singleUser[$name]=='off'){
                        $json.='"'.$name.'"'.':'.'"off"';
                    }

                    if($i<$len){
                        $json.=',';
                    }
                    $i++;
                }
            }else{
                $x++;
                continue;
            }

            $x++;
            if($x<$usersSize){
                $json.='},';
            }else{
                $json.='}';
            }
        }
        $json.='}';

        return $json;
    }

    public function showPrivilege(){

        return view('auth.users.usersPrivilege');
    }

    private function filterInputsName($inputs,$filterBy){

      #reuturn array with only select source in it
      foreach($inputs as $key => $oneRequest){
        if(!preg_match('#'.$filterBy.'#smi',$key)){
          unset($inputs[$key]);
        }else{
          unset($inputs[$key]);
          $accountName=str_replace($filterBy,'',$key);
          $inputs[$accountName]=$oneRequest;
        }
      }

      return $inputs;
    }

}
