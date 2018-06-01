<?php
/**
 * Created by PhpStorm.
 * User: Volmarg
 * Date: 01.06.2018
 * Time: 15:14
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;


class mediaLibraryViewComposer
{

    public function __construct()
    {

    }

    public function compose(View $view){

        $allImages=Storage::files('public/images');
        $smallImages=array();
        $bigImages=array();

        #sort images based on their size
        foreach ($allImages as $oneImage) {
            $fineUrl=str_replace('public/images/', 'storage/images/',$oneImage);
            $image = getimagesize($fineUrl);

            if($image[1]>800){
                array_push($bigImages,$oneImage);
            }else{
                array_push($smallImages,$oneImage);
            };
        }

        $view->with(compact('allImages','smallImages','bigImages'));
    }

}