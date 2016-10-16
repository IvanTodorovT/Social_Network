<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public $timestamps = false;
   
   public function author(){
   	return $this->belongsTo('App\User','user_id');
   }
   
   public function comments(){
   	return $this->hasMany('App\Comment');
   }
   
   //????
   public function albums(){
   	return $this->belongsTo('App\Album');
   }
}
