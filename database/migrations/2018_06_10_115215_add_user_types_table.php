<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

class AddUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_types', function (Blueprint $table) {
            //
        });


        $data=array(
            array(
                'type'=>'superAdmin',
                'privileges'=>'{
                    "users":"enable",
                    "posts":"enable",
                    "menu":"enable",
                    "media":"enable"
                }'
            ),
            array(
                'type'=>'admin',
                    'privileges'=>'{
                    "users":"disabled",
                    "posts":"enable",
                    "menu":"enable",
                    "media":"enable"
                }'
            ),
            array(
                'type'=>'normal',
                    'privileges'=>'{
                    "users":"disabled",
                    "posts":"enable",
                    "menu":"disabled",
                    "media":"disabled"
                }'
            ),
            array(
                'type'=>'suspended',
                'privileges'=>'{
                    "users":"disabled",
                    "posts":"disabled",
                    "menu":"disabled",
                    "media":"disabled"
                }'
            )
        );

        DB::table('users_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_types', function (Blueprint $table) {
            //
        });
    }
}
