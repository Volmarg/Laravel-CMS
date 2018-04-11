<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Gate;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

      $allUsers=users::all();

      if(Gate::allows('usersManagement',$allUsers)){
        return view('auth/users/view',compact('allUsers'));

      }else{
        return redirect('/home');

      }


    }
}
