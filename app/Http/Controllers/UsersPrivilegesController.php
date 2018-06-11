<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersPrivilegesController extends Controller
{
    #This function is used to generate json string out of selected checkboxes
    public function jsonPrivilegesGenerator(){
        /* $len -> counts how many options are there (on/off), and it's used to create ',' on last json element
         * $json-> general variable 'string' that in the end creates one big json string with all users data
         * all arrays are associative since this helps generating json with privileges names
        */

        $json='{'; #starting wrapper
        #prepare counters for iterations
        $x=0;
        $usersSize=0;

        #check how many users are there - this is used to generate ',' in json structure on last element
        foreach($_POST as $postName=>$singleUser){
            if(strstr($postName,'pivilege')){
                $usersSize++;
            }
        }

        #start iterating over all result post
        foreach($_POST as $postName=>$singleUser){

            $i=0;
            if(strstr($postName,'pivilegeSingle')){#for checked checkboxes
                $json.='"'.$x.'":{';
                foreach($singleUser as $name=>$value){
                    $len=count($singleUser)-1;
                    if($singleUser[$name]=='on'){
                        $json.='"'.$name.'"'.':'.'"enable"';
                    }

                    if($i<$len){
                        $json.=',';
                    }
                    $i++;
                }#for checkboxes that have been unchecked
            }elseif(strstr($postName,'pivilegeOffSingle')){
                $json.='"'.$x.'":{';
                foreach($singleUser as $name=>$value){
                    $len=count($singleUser)-1;
                    if($singleUser[$name]=='off'){
                        $json.='"'.$name.'"'.':'.'"disabled"';
                    }

                    if($i<$len){
                        $json.=',';
                    }
                    $i++;
                }
            }else{
                $x++;
                continue;
            }

            $x++;
            if($x<$usersSize){
                $json.='},';
            }else{
                $json.='}';
            }
        }
        $json.='}';

        return $json;
    }

    #this function simply holds the default user type based privileges
    public function defaultRolePrivileges
    ($key){
        $privileges=array(
                'superAdmin'=>'{
                "users":"enable",
                "posts":"enable",
                "menu":"enable",
                "media":"enable"
            }',
            'admin'=>'{
                "users":"disabled",
                "posts":"enable",
                "menu":"enable",
                "media":"enable"
            }',
            'normal'=>'{
                "users":"disabled",
                "posts":"enable",
                "menu":"disabled",
                "media":"disabled"
            }',
            'suspended'=>'{
                "users":"disabled",
                "posts":"disabled",
                "menu":"disabled",
                "media":"disabled"
            }'
        );

        return $privileges[$key];
    }
}
