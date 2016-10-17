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

class SearchTextController extends Controller
{
    
public function submit(Request $request)
    {
    $findme = $request->input('content4');
    
    $postove =	DB::table('users2 as u')
    ->join('posts as p', function($join)
   
    {
    	$join->on('u.id', '=', 'p.user_id');
    })
    ->select('u.id AS uid','p.id AS pid','u.firstname','u.lastname','u.created_at','p.text','p.photo','u.profile_pic')
    ->where('text', 'like', '%'.$findme.'%')
    ->get();
    
 
     	$data = [];
	    $data['postove'] = $postove;
    	
 		return View::make("searchText",$data);
	 	
    }  
    
 public function show(){
   
    $postove = array();
    	$data = array (
 			'postove' => $postove
 	);
    	return view('searchText')->with($data);
    }

}
