<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\postValidation;

class postingController extends Controller
{
    public function create(postValidation $request){
      $db=new post();
      $db->title=request('title');
      $db->body=request('body');
      $db->user_id=Auth::user()->id;
      $db->slug=str_slug(request('title'),'-');
      $db->save();

      return back();
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

      return back();
    }

    public function remove($slug){

      post::where('slug',$slug)->delete();
      return back();

    }
}
