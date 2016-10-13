<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Redirect;
use App\Post;

class SearchController extends Controller
{
  
    
    
   public function submit(Request $request)
    {
		
    /* 	$post_text = $request->input('content2');
    	
    	$post = new Post();
    	$post->user_id = Auth::user()->id;
    	$post->text = $post_text;

    	$post->save(); */
    
    	
   	$users = DB::table('users2')->where('firstname', '=', 'Vanio')->get();
    	var_dump($users);
    	return Redirect::route('search.show');
    }  
    
    public function show(Request $request){
    	
    	//$post = Post::find($post_id);
    	//var_dump($post);
    	//return view('search');
    }

    
    
    
}
