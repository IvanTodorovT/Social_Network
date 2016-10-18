<?php
use App\Likes;

$relatedness = [];
foreach ( $posts as $key => $post ){
	$hits = count(array_intersect([$post->tag1, $post->tag2, $post->tag3], $tags));
	$relatedness[$hits][] = $key;
}

$output = '';
$resultsPerView = 50;

for ($i = max(array_keys($relatedness)); $i > 0 && $i > count($relatedness) - $resultsPerView; $i--) {
	if(empty($relatedness[$i])){
		continue;
	}
	foreach ($relatedness[$i] as $index => $key){
		$post = $posts[$key];
		$who = $post->firstname . ' ' . $post->lastname;
		$authorID = $post->user_id;
		$avatar = "../resources/uploads/" . $post->avatar;
// 		$avatar = resource_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $post->avatar;
	
		$type = 'post';
		$id = $post->id;
		$photo = "../resources/uploads/" . $post->photo;
// 		$photo = resource_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $post->photo;
		$text = $post->text;
	
		$tagsArray = [];
		$post->tag1 ? $tagsArray[] = $allTags[($post->tag1 - 1)] : null;
		$post->tag2 ? $tagsArray[] = $allTags[($post->tag2 - 1)] : null;
		$post->tag3 ? $tagsArray[] = $allTags[($post->tag3 - 1)] : null;
		$tags = implode(', ', $tagsArray);
		$date = $post->created_at;
		
		$albumID = $post->albumId;
		$pathToAlbum = ''; // for when the album view is ready!
		$album = $post->albumName ? '<p class="album" id=' . $albumID . '>
					Album: <a href="' . $pathToAlbum . '">' . $post->albumName . '</a></p>'
					: '';
		
		$comments = isset($numbers['comments'][$post->id]) ? $numbers['comments'][$post->id] : 0;
		$likes = isset($numbers['like'][$post->id]) ? $numbers['like'][$post->id] : 0;
		$dislikes = isset($numbers['dislike'][$post->id]) ? $numbers['dislike'][$post->id] : 0;
		$likeStatus = $dislikeStatus = '';
		if (isset($numbers['status'][$post->id])){
			if ($numbers['status'][$post->id] == 'like'){
				$likeStatus = 'inactive';
			} else if ($numbers['status'][$post->id] == 'dislike') {
				$dislikeStatus = 'inactive';
			}
		}
		
		
		$output .= 
			'<div class="' . $type . '" id=' . $id . ' style="display: inline-block; width: 30%; margin: 1em 10%;">
				<p>
					<img style="width:50px; height:50px;" src="' . $avatar . '" alt="no pic">
					<a href="profile_preview/"' . $authorID . '">' . $who . '</a>
					<span> said: </span>
				</p>
				<p>&nbsp;&nbsp;&nbsp;' . $text . '</p>
				<div style="height: 30vh; text-align: center; vertical-align: middle">
					<img style="max-width:30%; max-height:30vh;" src="' . $photo . '" alt="no pic">
				</div>
				' . $album . '
				<p style:"width: 100%"> Tags: ' . $tags . '</p>
				<span style="opacity: 0.5;">' . $date . '</span>
				<div class="likeButtons">
					<i style="color: green;" class="fa fa-thumbs-up ' . $likeStatus . '" aria-hidden="true"></i>
					<span class="countLikes">' . $likes . '</span>
					<i style="color: red;" class="fa fa-thumbs-down ' . $dislikeStatus . '" aria-hidden="true"></i>
					<span class="countDislikes">' . $dislikes . '</span>
					<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
					<span class="countComments">' . $comments . '</span>
				</div>
				<hr style="margin-top: 3.4em">
			</div>';
	}
}

if (count($relatedness) == 0){
	$output = '<h2 style="text-align: center">No search results</h2>';
}
?>

<section id='searchByTagResults' style='font-size: 1.3em;'>
	<?= $output?>
</section>


<script>
	$(function (){
		addLikes();
	});
</script>