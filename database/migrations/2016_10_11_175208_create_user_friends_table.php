<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users_friends', function (Blueprint $table) {
        	$table->increments('id');
        	$table->integer('user_id');
        	$table->integer('friend_id');
            $table->foreign('user_id')->references('id')->on('users2');
            $table->foreign('friend_id')->references('id')->on('users2');
            $table->timestamp('created_at');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_friends');
    }
}
