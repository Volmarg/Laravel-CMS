<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests\uploadValidation;

class uploadController extends Controller
{
    public function send(){

      return view('/partials/admin/uploadPanel');
    }

    public function save(uploadValidation $request){
      $files=request()->file();

        foreach($files as $fileData){
            Storage::putFile('public/images',new File($fileData));

        }
        return redirect('/media/upload');
    }
}
