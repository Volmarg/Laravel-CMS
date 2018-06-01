<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\menu;
use App\post;

class commonDataComposer {


    public function compose(View $view)
    {
        $menuElements=menu::all()->sortBy('sortOder');

        $posts=new post();
        $meta=$posts->meta();
        $view->with(compact('menuElements','meta'));
    }

}
