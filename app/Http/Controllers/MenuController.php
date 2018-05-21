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

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(){

    $menus=new menu();




#dd($_POST);
    $sortCounter=0;
    foreach($_POST as $id => $oneInput){
      if($id==0){continue;}



      elseif($oneInput=='false'){
        $menus->where('id',$id)->delete();

      }elseif($oneInput=='true'){
        $menus->where('id',$id)->update([
          'sortOder'=>$sortCounter
        ]);
      }else{

        #checking how many elements are in DB and post
        $sizeDB=$menus->max('id');
        $sizePOST=count($_POST);

        $menus->insert([
          'name'=>$_POST[$id][0], 'slug'=>$_POST[$id][1], 'depth'=>'1','parentID'=>'-1','sortOder'=>$sortCounter
        ]);
      }
      $sortCounter++;
    }

    return redirect($_SERVER['HTTP_REFERER']);
  }


}
