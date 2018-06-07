<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Articles;



class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'view']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('auth/posts/post');
    }

    public function manage(){
        $posts=post::all();

        return view('auth/posts/manage',compact('posts'));
    }

    public function edit($slug){
      $posts=new post();
      $query=$posts->all()->where('slug',$slug);
      $post=$query->first();

      return view('auth/posts/edit',compact('post'));
    }

    public function view($slug){

      $postsData=post::all()->where('slug',$slug);
      $postData=$postsData->first();
      return view('/partials.front.singlePost',compact('postData'));
    }

}
