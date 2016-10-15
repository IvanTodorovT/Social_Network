<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\User;
use Redirect;
use App\Post;

use View;

class SearchController extends Controller
{
    
   public function submit(Request $request)
    {
	
	    $findme = $request->input('content3');
	   	$users = User::where('firstname', 'like', '%'.$findme.'%')
	   	->orWhere('lastname', 'like', '%'.$findme.'%')
	   	->orWhere('username', 'like', '%'.$findme.'%')
	   	->get();
	   	
	   	$followers_ids = DB::table('users_friends')
	   	->distinct('friend_id')
	   	->where('user_id',Auth::user()->id)
	   	->pluck('friend_id')->toArray();
	 
	    $data = [];
	    $data['users'] = [];
	   	foreach ($users as $user){
	//    		echo "Firstname:". $user->firstname,'<br />';
	//    		echo "Lastname:".$user->lastname, '<br />';
	//    		echo "-----------------------", '<br />';
	   		$data['users'][] = $user;
	   	}
	
	  
	   	
// 	   dd($data);
	   	$data['followers_ids'] = $followers_ids;
	 	return View::make("search",$data);

    }  
    
    
    
    
    public function show(){
    	return view('search');
   
    }

    
    
    
}
