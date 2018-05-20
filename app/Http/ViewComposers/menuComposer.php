<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\menu;

class MenuComposer {


    public function compose(View $view)
    {
        $menuElements=menu::all()->sortBy('sortOder');
        $view->with('menuElements', $menuElements);
    }

}
