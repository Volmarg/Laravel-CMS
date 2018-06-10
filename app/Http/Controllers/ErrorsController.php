<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ErrorsController extends Controller
{
    public function handle(){
        /*
        $type=Session::get('type');
dd($type);
        if($type=='suspended'){

        }
        */
        return view('errors.suspended');
    }
}
