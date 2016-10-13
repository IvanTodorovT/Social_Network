<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsLikedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    	Schema::create('is_liked', function (Blueprint $table) {
    		$table->engine = 'InnoDB';
    		$table->increments('id');
    		$table->integer('user_id');
    		$table->integer('post_id');
    		$table->boolean('is_liked');
    		$table->foreign('user_id')->references('id')->on('users2');
    		$table->foreign('post_id')->references('id')->on('posts');
    		 
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('is_liked');
    }
}
