<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\usersTypes;
use Gate;

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
}
