<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public function id($name){
        return $this->select('id')->where('name',$name)->get()->toArray();
    }

    public function remove_($name){
        return $this->remove($name);
    }

    public function updateAccountType($key,$oneRequest){
        return $this->where('name',$key)->update(['accountType'=>$oneRequest]);
    }
}
