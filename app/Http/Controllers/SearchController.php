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
	 
	    $data = [];
	    $data['users'] = [];
	   	foreach ($users as $user){
	//    		echo "Firstname:". $user->firstname,'<br />';
	//    		echo "Lastname:".$user->lastname, '<br />';
	//    		echo "-----------------------", '<br />';
	   		$data['users'][] = $user;
	   	}
	
	  
	   	
// 	   dd($data);
	   	
	 	return View::make("search",$data);

    }  
    
    
    
    
    public function show(){
    	return view('search');
   
    }

    
    
    
}
