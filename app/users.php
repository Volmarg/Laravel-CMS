<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public function id($name){
        return $this->select('id')->where('name',$name)->get()->toArray();
    }

    public function remove($name){
        return $this->where('name',$name)->delete();
    }

    public function updateAccountType($key,$oneRequest){
        return $this->where('name',$key)->update(['accountType'=>$oneRequest]);
    }

}
