<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\post;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        $allPosts=post::all();

        return view('partials/admin/menu',compact('menuElements','allPosts'));
  }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(menu $menuEloq){

        $menus=new menu();
        $menuElements=json_decode($_POST['json'],true);
        //delete current menu elements and rebuild it
        $menus->truncate();

        foreach($menuElements as $oneMenu){
        $name=$oneMenu[0];
        $slug='';
        $parentID='';
            //first insert box data = will be unclickable
            $menuEloq->updateMenu($name,'#',1,'-1',0);
            $id=$menuEloq->getElementID($name)[0]['id'];

            foreach($oneMenu[1] as $links){
                $slug=$links[1];
                $name=$links[0];

                //now insert rest element data as submenu
                $menuEloq->updateMenu($name,$slug,1,$id,0);
            }

        }

    return back();
  }


}
