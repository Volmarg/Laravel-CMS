<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($x=0;$x<=10;$x++){
        DB::table('users')->insert([
          'name'=>str_random(10),
          'email'=>str_random(10).'@wp.pl',
          'password'=>bcrypt('26021991'),
          'accountType'=>'normal',
        ]);
      }

    }
}
