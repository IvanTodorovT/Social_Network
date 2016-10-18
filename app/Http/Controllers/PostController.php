<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Post;
use App\Likes;
use App\Comments;


class PostController extends Controller
{
  
    

   
    public function __construct()
    {
    	//@TODO
//         $this->middleware('guest');
    }

    
     public function submit(Request $request)
    {
		
    	$post_text = $request->input('content');
    	$photo_input = $request->input('photo');
    	
    	$post = new Post();
    	$post->user_id = Auth::user()->id;
    	$post->text = $post_text;
    	$post->photo = $photo_input;
    	
    	$post->save();
    
    	
//     	DB::insert('insert into posts (user_id,text) values (?,?)', array(Auth::user()->id , $post_text));
    	
    	return Redirect::route('profile.show');
    }  
    
    public function show(Request $request,$post_id){
    	
    	$post = Post::find($post_id);
    	var_dump($post);
    }
    
    public function listAll(Request $request){
    
    	//$posts = Post::where('status',1)->get();
    	$followers_ids = Auth::user()->getFollowersIds();
    	$posts = Post::with('author')
    	->whereIn('user_id',$followers_ids)
    	->orderBy('created_at','desc')
    	->get();
    	
    	foreach ($posts as $post) {
    		$idArray[] = $post->id;
    	}
    	
    	$numbers = Likes::getNumbers('post_status', 'post_id', $idArray);
    	$numbers['comments'] = Comments::getCommentsCount('post_comments', 'post_id', $idArray);
    	
    	$data = array (
    		'posts' => $posts,
    		'numbers' => $numbers
    	 );
    				
    	return view('wall', $data);
    }
    
    public function listAll2($user_id){
    
    	$user = DB::table('users2')->where('id', '=', $user_id)->first();
    	 
    	$data = array (
    			'user' => $user
    	);
    	 
    
    
    	 
    	 
    	return view('profile_preview', $data);
    	 
    }
    
}
