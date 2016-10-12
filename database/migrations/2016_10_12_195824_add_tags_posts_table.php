<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function(Blueprint $table){
        $table->string('tag1');
        $table->string('tag2');
        $table->string('tag3');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   Schema::table('posts', function ($table) {
            $table->drop_column('tag1');
            $table->drop_column('tag2');
            $table->drop_column('tag3');
        });
	}
}