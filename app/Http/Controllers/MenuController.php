<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\post;

class MenuController extends Controller
{

  public function view(){
    $allPosts=post::all();

    return view('partials/admin/menu',compact('menuElements','allPosts'));

  }

  public function edit(){

    $menus=new menu();

    foreach($_POST as $id => $oneInput){
      if($oneInput=='false'){
        $menus->where('id',$id)->delete();
      }
    }
    die();

    return redirect($_SERVER['HTTP_REFERER']);
  }


}
