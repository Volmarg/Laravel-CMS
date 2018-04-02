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
}
