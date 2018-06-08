<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public function getElementID($name){
        return $this->select('id')->where('name',$name)->get()->toArray();
    }
}
