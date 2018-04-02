<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mediaLibraryController extends Controller
{
    public function view(){

      $allImages=Storage::files('public/images');

      return view('partials/admin/mediaLibrary',compact('allImages'));
    }

    public function remove(){
      $filename=request('fileName');
      //dd($filename);
      Storage::delete($filename);

      return redirect('/media-library');
    }
}
