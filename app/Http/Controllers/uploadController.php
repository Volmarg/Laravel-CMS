<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class uploadController extends Controller
{
    public function send(){

      return view('/partials/admin/uploadPanel');
    }

    public function save(){
      $files=array();
      $files=request()->file();

        foreach($files as $file){
          foreach($file as $fileData){
            $name=$fileData->getClientOriginalName();

            #$putted=Storage::put($name,file_get_contents($fileData));
            $putted=Storage::putFile('public/images',new File($fileData));


            return redirect('/upload');
          }
        }


        //dd($files);
    }
}