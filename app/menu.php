<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public function getElementID($name){
        return $this->select('id')->where('name',$name)->get()->toArray();
    }

    public function updateMenu($name,$slug,$depth,$parentID,$sortOrder){
        $this->insert([
            'name' => $name,
            'slug' => $slug,
            'depth' => $depth,
            'parentID' => $parentID,
            'sortOder' => $sortOrder
        ]);
    }
}
