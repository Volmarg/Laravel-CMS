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

    public function updateUserProfile($id,$data){
        users::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'image'=>$data['image']
        ]);

        if($data['password']!='' && $data['password']!=null){
            users::where('id',$id)->update([
                'password'=>bcrypt($data['password'])
            ]);
        }
    }

    public function getStatus($id){
        return $this->select('accountType')->where('id',$id);
    }
}
