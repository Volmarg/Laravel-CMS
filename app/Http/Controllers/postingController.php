<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\Auth;

class postingController extends Controller
{
    public function create(){



      $this->validate(request(),[
      'title'=>'required',
      'body'=>'required']);

      $db=new post();
      $db->title=request('title');
      $db->body=request('body');
      $db->user_id=Auth::user()->id;
      $db->slug=str_slug(request('title'),'-');
      $db->save();

      return redirect('/posts/create');
    }

    public function edit(){

      $this->validate(request(),[
      'title'=>'required',
      'body'=>'required']);

      $db=new post();
      $db->where('id',request('post_id'))
         ->update([
           'title'=>request('title'),
           'body'=>request('body')
         ]);

      return redirect('/');
    }
}
