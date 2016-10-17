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
use App\Tags;

class SearchController extends Controller
{
    
   public function submit(Request $request)
    {
	    $findme = $request->input('content3');
	    $users = User::getMatched($findme);
	 
	    $data = [];
	    $data['users'] = $users;
	   	$data['followers_ids'] = Auth::user()->getFollowersIds();
	 	return View::make("search",$data);
    }  
    
    public function show(){
    	return view('search');
    }

    public function searchPostForm()
    {
    	return view('searchTag');
    }
    
    public function getSearchByTagResults()
    {
	    if(count($_GET['tags']) > 6){
	    	return 'Are you hacking me? As if 6 tags were not enough';
	    }
	    $posts = Tags::getMatches($_GET['tags']);
	    return view('searchByTagResults', [
	    			'posts' => $posts, 
	    			'tags' => $_GET['tags'],
	    			'allTags' => Tags::getTags()
	    ]);
    }
}
