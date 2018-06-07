<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\usersTypes;
use Gate;
use Request as facadeRequest;
use App\usersPrivilages;
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

    public function changeUserType(Request $request, users $users_){


    #first get the data sent from form
      $allUsersInputs=$request->all();
      $filteredSelects=$this->filterInputsName($allUsersInputs,'accountType-select-');

      foreach($filteredSelects as $key => $oneRequest){

    #set roles for all users
          $users_->updateAccountType($key,$oneRequest);

    #set default privileges for given uer type
          $id=$users_->id($key);    #get user ID
          $id=$id[0]['id'];

          $privs=$this->defaultRolePrivileges($oneRequest); #getPrivileges for that role
          usersPrivilages::where('users_id',$id)->update(['privilege'=>$privs]);
      }

      return back();
    }

    public function changeUserPrivileges(usersPrivilages $privileges_eloq){

        #This returns arrays of settings for users
        $allUsersJson=$this->jsonPrivilegesGenerator();
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

    public function userOptions(Request $request){
        users::where('id',Auth()->user()->id)->update([
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'image'=>$_POST['image']
        ]);

        if($_POST['password']!='' && $_POST['password']!=null){
            users::where('id',Auth()->user()->id)->update([
                'password'=>bcrypt($_POST['password'])
            ]);
        }

        return back();
    }

    private function jsonPrivilegesGenerator(){
        /* $len -> counts how many options are there (on/off), and it's used to create ',' on last json element
         * $json-> general variable 'string' that in the end creates one big json string with all users data
         * all arrays are associative since this helps generating json with privileges names
        */

        $json='{'; #starting wrapper
        #prepare counters for iterations
        $x=0;
        $usersSize=0;

        #check how many users are there - this is used to generate ',' in json structure on last element
        foreach($_POST as $postName=>$singleUser){
            if(strstr($postName,'pivilege')){
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
                        $json.='"'.$name.'"'.':'.'"enable"';
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
                        $json.='"'.$name.'"'.':'.'"disabled"';
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

        #checking if actually role changed for given user
        #remove users that aren't changing
        foreach($inputs as $key=>$oneSelect){
            $oldRole=users::select('accountType')->where('name',$key)->get()->toArray();

            $oldRole=$oldRole[0]['accountType'];
            $currRole=$inputs[$key];

            if($oldRole==$currRole){
                unset($inputs[$key]);
            }
        }

        return $inputs;
    }

    private function defaultRolePrivileges($key){
        $privileges=array(
            'superAdmin'=>'{"users":"enable","posts":"enable","menu":"enable","media":"enable"}',
            'admin'=>'{"users":"disabled","posts":"enable","menu":"enable","media":"enable"}',
            'normal'=>'{"users":"disabled","posts":"enable","menu":"disabled","media":"disabled"}',
            'suspended'=>'{"users":"disabled","posts":"disabled","menu":"disabled","media":"disabled"}'
        );

        return $privileges[$key];
    }

}
