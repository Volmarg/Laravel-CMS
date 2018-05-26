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
    dd($_POST);
    #removing/changing depth on elements
    $sortCounter=0;
    foreach($_POST['state'] as $id => $oneInput){

     if($_POST['state'][$id]=='false'){
        $menus->where('id',$id)->delete();

      }elseif($_POST['state'][$id]=='true'){
        $menus->where('id',$id)->update([
          'sortOder'=>$sortCounter
        ]);
      }
      $sortCounter++;
    }

    #For adding new items into DB
    foreach($_POST as $id => $oneInput) {

        if($id!='state' && $id!='_token' && $id!='level') {
            #checking how many elements are in DB and post
            $sizeDB = $menus->max('id');
            $sizePOST = count($_POST);

            $menus->insert([
                'name' => $oneInput[0], 'slug' => $oneInput[1], 'depth' => $oneInput[2], 'parentID' => '-1', 'sortOder' => $sortCounter
            ]);
        }
    }



    return redirect($_SERVER['HTTP_REFERER']);
  }


}
