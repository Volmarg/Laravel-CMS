<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccountTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $types=array('admin','normal','superAdmin','suspended');

      foreach($types as $key=>$type){
        DB::table('users_types')->insert([
          'type'=>$type,
        ]);
      }

    }
}
