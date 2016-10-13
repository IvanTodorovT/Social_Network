<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstnameLastnameToPostsDefaultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function(Blueprint $table){
        $table->string('firstname');
        $table->string('lastname');
       // $table->renameColumn('name', 'username');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('users', function ($table) {
            $table->drop_column('firstname');
            $table->drop_column('lastname');
        	//$table->renameColumn('username', 'name');
        });
    }
}
