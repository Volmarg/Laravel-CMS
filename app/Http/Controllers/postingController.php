<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\postValidation;

class postingController extends Controller
{
    public function create(postValidation $request,post $post){

        $post->createPost(
            request('title'),
            request('body'),
            Auth::user()->id,
            str_slug(request('title'),'-'),
            request('metaTitle'),
            request('metaDescription')
        );

      return back();
    }

    public function edit(postValidation $request, post $post){

      $post->updatePost(
          request('post_id'),
          request('title'),
          request('body'),
          request('metaTitle'),
          request('metaDescription')

      );

      return back();
    }

    public function remove($slug){

      post::where('slug',$slug)->delete();
      return back();

    }
}
