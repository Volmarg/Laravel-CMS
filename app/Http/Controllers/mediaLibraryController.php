<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mediaLibraryController extends Controller
{
    public function view(){

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


      return view('partials/admin/mediaLibrary',compact('allImages','smallImages','bigImages'));
    }

    public function remove(){
      $filename=request('fileName');
      //dd($filename);
      Storage::delete($filename);

      return redirect('/media/library');
    }
}
