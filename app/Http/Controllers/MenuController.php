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
      if($id==1){continue;}

      elseif($oneInput=='false'){
        $menus->where('id',$id)->delete();

      }elseif($oneInput=='true'){

      }else{
        #checking how many elements are in DB and post
        $sizeDB=count($menus->all());
        $sizePOST=count($_POST)-1;

        #if element was added then post is bigger than DB
        if($sizePOST>$sizeDB){
            for($x=$sizeDB;$x<=$sizePOST;$x++){
              $menus->insert([
                'name'=>$_POST[$x][0], 'slug'=>$_POST[$x][1], 'depth'=>'1','parentID'=>'-1'
              ]);
            }
        }

      }
    }

    return redirect($_SERVER['HTTP_REFERER']);
  }


}
