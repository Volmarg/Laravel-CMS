<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuFrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($x=0;$x<=5;$x++){
        DB::table('menus')->insert([
          'name'=>str_random(5),
          'depth'=>1,
          'parentID'=>'-1',
          'slug'=>'#'.str_random(10),
        ]);        
      }

    }
}
