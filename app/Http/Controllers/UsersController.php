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

      $allUsers=users::all();
      $accountTypes=usersTypes::all();

      if(Gate::allows('usersManagement',$allUsers)){
        return view('auth/users/view',compact('allUsers','accountTypes'));

      }else{
        return redirect('/home');

      }

    }

    public function removeUser($sluger){

        users::where('name',$sluger)->delete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function changePrivilage(Request $request){

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
