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
  
    

   
    public function __construct()
    {
    	//@TODO
//         $this->middleware('guest');
    }

    
     public function submit(Request $request)
    {
		
    	//$edit = $request->input('content');
    	
    	
    	
    	
    	$edit = 'Test';
    	
    	DB::table('users2')
    	->where('id', 3)
    	->update(array('username' => $edit));
    
    	
    	
    	
    	
    	
    	
//     	DB::insert('insert into posts (user_id,text) values (?,?)', array(Auth::user()->id , $post_text));
    	
    	return Redirect::route('edit.show');
    }  
    
    public function show(Request $request,$post_id){
    	
    	//$post = Post::find($post_id);
    	//var_dump($post);
    }
    
    public function listAll(Request $request){
    
    	//$posts = Post::where('status',1)->get();
    	
    	//$posts = Post::all();
    	//var_dump($posts);
    	//echo $posts->pluck('text');
    }


    
    
    
}
