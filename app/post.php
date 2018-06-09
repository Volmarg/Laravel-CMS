<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Eloquent do przeciwczenia
/*
  $query, $costam,
  jeszcze wywolania class w funkcji do czego bylo
*/


class post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meta(){
        return $this->select('id','metaTitle','metaDescription')->get()->toArray();
    }

    public function createPost($title,$body,$user_id,$slug,$metaTitle,$metaDescription){
        $this->insert([
            'title'             =>$title,
            'body'              =>$body,
            'user_id'           =>$user_id,
            'slug'              =>$slug,
            'metaTitle'         =>$metaTitle,
            'metaDescription'   =>$metaDescription
        ]);
    }

    public function updatePost($post_id,$title,$body,$metaTitle,$metaDescription){
        $this->where('id',$post_id)
             ->update([
                'title'             =>$title,
                'body'              =>$body,
                'metaTitle'         =>$metaTitle,
                'metaDescription'   =>$metaDescription
            ]);

    }

    public function editPostBladeViewData($slug){
        return $this->all()->where('slug',$slug)->first();
    }
}
