<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mediaLibraryController extends Controller
{
    public function view(){
      return view('partials/admin/mediaLibrary');
    }

    public function remove(){
      $filename=request('fileName');
      Storage::delete($filename);

      return redirect('/media/library');
    }
}
