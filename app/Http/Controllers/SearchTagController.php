<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Likes;
use App\Comments;

class SearchTagController extends Controller
{
	public function show()
	{
		return view('searchTag');
	}
	
	public function submit()
	{
		if(count($_POST['tags']) > 6){
			return 'Are you hacking me? As if 6 tags were not enough!';
		}
		$posts = Tags::getMatches($_POST['tags']);
		
		$idArray = [];
		$statuses = [];
		foreach ($posts as $post) {
			$idArray[] = $post->id;
		}
		$numbers = Likes::getNumbers('post_status', 'post_id', $idArray);
		$numbers['comments'] = Comments::getCommentsCount('post_comments', 'post_id', $idArray);
		
		return view('Modules.searchByTagResults', [
				'posts' => $posts,
				'tags' => $_POST['tags'],
				'allTags' => Tags::getTags(),
				'numbers' => $numbers
		]);
	}
}