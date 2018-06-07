<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersPrivilages extends Model
{
    public function remove($id){
            return $this::where('users_id',$id)->delete();
    }
}
