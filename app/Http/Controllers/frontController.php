<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\post;

class frontController extends Controller
{
    public function posts(){
      $post=new post();
      $posts=$post->all();

      return view('partials/front/posts',compact('posts'));
    }

    public function subdomain(){
      return 'Yes, this is a subdomain!';
    }
}
