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

class SearchTagController extends Controller
{
    
public function submit(Request $request)
    {
    $findme = $request->input('content4');
	    
	$postove =	DB::table('users2')
 	->join('posts', function($join)
 	{
 		$join->on('users2.id', '=', 'posts.user_id');
 	})
 	->where('text', 'like', '%'.$findme.'%')
 	->get();

 	
 
 
    	 
     	$data = [];
	    $data['postove'] = $postove;
    	
 		return View::make("searchTag",$data);
	 	
    }  
    
    public function show(){
    	return view('searchTag');
    }
    
    

}
