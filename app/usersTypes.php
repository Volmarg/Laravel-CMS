<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersTypes extends Model
{
    public function getPrivileges($key){

        return $this->select('privileges')->where('type',$key)->first()->privileges;
    }
}
