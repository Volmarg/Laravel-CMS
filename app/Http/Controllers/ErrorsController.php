<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ErrorsController extends Controller
{
    public function handle(){

        $type=Session::get('type');
        if($type=='suspended'){
            return view('errors.suspended');
        }elseif($type=='blocked'){
            return view('errors.denied');
        }

        die('Unexpected return statement in ErrorsController');
    }
}
