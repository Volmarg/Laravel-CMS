<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formTestController extends Controller
{

    public function show(){

        $var='test';

        return view('tests.formsCollective',compact('var'));
    }

}
