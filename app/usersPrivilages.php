<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersPrivilages extends Model
{
    public function remove($id){
            return $this::where('users_id',$id)->delete();
    }


    public function getUserID($userID,$toArray=true){
        return $this->where('users_id',$userID)->update(['privilege'=>$privs]);
    }

    public function updatePrivilege($updateIterator,$singleJson){
        $this->where('id',$updateIterator)->update(['privilege'=>$singleJson]);
    }

    public function updateRoleBasedPrivilege($id,$privs){
        $this->where('users_id',$id)->update(['privilege'=>$privs]);
    }

    public function getOnePrivilege($uID){

   }
}
