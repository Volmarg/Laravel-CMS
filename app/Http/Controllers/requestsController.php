<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;

class requestsController extends Controller
{

    //TODO: Test this function as service provider
    public function filterInputsName($inputs,$filterBy){

        #reuturn array with only select source in it
        foreach($inputs as $key => $oneRequest){
            if(!preg_match('#'.$filterBy.'#smi',$key)){
                unset($inputs[$key]);
            }else{
                unset($inputs[$key]);
                $accountName=str_replace($filterBy,'',$key);
                $inputs[$accountName]=$oneRequest;
            }
        }

        #checking if actually role changed for given user
        #remove users that aren't changing
        foreach($inputs as $key=>$oneSelect){
            $oldRole=users::select('accountType')->where('name',$key)->get()->toArray();

            $oldRole=$oldRole[0]['accountType'];
            $currRole=$inputs[$key];

            if($oldRole==$currRole){
                unset($inputs[$key]);
            }
        }

        return $inputs;
    }


}
