<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//looks cool, but I don't know how to use it...
	 
	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function post(){
		return $this->belongsTo('App\Post');
	}
	
}
