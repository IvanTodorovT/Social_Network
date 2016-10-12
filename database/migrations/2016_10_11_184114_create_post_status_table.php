<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('post_status', function (Blueprint $table) {
    		$table->engine = 'InnoDB';
    		$table->increments('id');
    		$table->integer('post_id');
    		$table->boolean('count_likes');
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
         Schema::drop('post_status');
    }
}
