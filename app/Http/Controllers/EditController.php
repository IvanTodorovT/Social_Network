<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Post;


class EditController extends Controller
{
  
    
	public function submit(Request $request)
	{
	
		
		 
	 $new_firstname = $request->input('new_firstname');
	 $new_lastname = $request->input('new_lastname');
	 $new_username = $request->input('new_username');
	 $new_description = $request->input('description');

	 
	 
	 if (empty ( $_POST ['new_firstname'] ) ) {
	 
	 	$new_firstname = Auth::user()->firstname;
	 
	 }
	 
	 if (empty ( $_POST ['new_lastname'] ) ) {
	 
	 	$new_lastname = Auth::user()->lastname;
	 
	 }
	 
	 if (empty ( $_POST ['new_username'] ) ) {
	 
	 	$new_username = Auth::user()->username;
	 
	 }
	 
	 
	 if (empty ( $_POST ['new_description'] ) ) {
	 
	 	$new_username = Auth::user()->username;
	 
	 }
	 
DB::table('users2')
->where('id', Auth::user()->id)
->update(array('firstname' => $new_firstname,'lastname' => $new_lastname,'username' => $new_username,'description' => $new_description));
	
		//$post->save();
	
		 
		//     	DB::insert('insert into posts (user_id,text) values (?,?)', array(Auth::user()->id , $post_text));
		 
		return Redirect::route('profile.show');
	}
	
	public function show(){
		 
		
	}
    
    
}
