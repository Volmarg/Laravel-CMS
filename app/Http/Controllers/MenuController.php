<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;

class MenuController extends Controller
{

  public function view(){
    $menuElements=menu::all();

    return view('partials/admin/menu',compact('menuElements'));

  }


}
