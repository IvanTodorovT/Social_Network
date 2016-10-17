<?php

namespace App\Http\Controllers;

use App\Tags;

class SearchTagController extends Controller
{
	public function show()
	{
		return view('searchTag');
	}
	
	public function submit()
	{
		if(count($_POST['tags']) > 6){
			return 'Are you hacking me? As if 6 tags were not enough';
		}
		$posts = Tags::getMatches($_POST['tags']);
		return view('Modules.searchByTagResults', [
				'posts' => $posts,
				'tags' => $_POST['tags'],
				'allTags' => Tags::getTags()
		]);
	}
}