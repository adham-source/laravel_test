<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Members extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # Create table to insert posts
            Schema::create('members', function (Blueprint $table){
            $table -> id();
            $table -> string('name');
            $table -> string('email'); // -> unique(); databese validation or not
            $table -> string('password');
            $table  -> rememberToken();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
