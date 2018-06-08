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
    public function edit(menu $menuCtrl){

        $menus=new menu();
        $menuElements=json_decode($_POST['json'],true);
        //delete current menu elements and rebuild it
        $menus->truncate();

        foreach($menuElements as $oneMenu){
        $name=$oneMenu[0];
        $slug='';
        $parentID='';
            //first insert box data = will be unclickable
            $menus->insert([
                'name' => $name,
                'slug' => '#',
                'depth' => 1,
                'parentID' => '-1',
                'sortOder' => 0
            ]);

            $id=$menuCtrl->getElementID($name)[0]['id']; //--> refractored to check

            foreach($oneMenu[1] as $links){
                $slug=$links[1];
                $name=$links[0];

                //now insert rest element data as submenu
                $menus->insert([
                    'name' => $name,
                    'slug' => $slug,
                    'depth' => 1,
                    'parentID' => $id,
                    'sortOder' => 0
                ]);
            }

        }

    return back();
  }


}
