<?php

foreach ( $posts as $key => $post ){
	$hits = count(array_intersect([$post->tag1, $post->tag2, $post->tag3], $tags));
	$relatedness[$hits][] = $key;
}

$output = '';
$resultsPerView = 50;

for ($i = count($relatedness); $i > 0, $i > count($relatedness) - $resultsPerView; $i--) {
	$who = $post->firstname . ' ' . $post->lastname;
	$authorID = $post->user_id;
	$avatar = resource_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $post->avatar;

	$type = 'post';
	$id = $post->id;
	$photo = resource_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $post->photo;
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
	
	$output .= 
		'<div class="' . $type . '" id=' . $id . '>
			<p>
				<img style="width:50px; height:50px;"' . $avatar . '" alt="no pic">
				<a href="profile_preview/"' . $authorID . '">' . $who . '</a>
				<span> said: </span>
			</p>
			<p>' . $text . '</p>
			
			<img style="width:200px; height:200px;" src="' . $photo . '" alt="no pic" />
			' . $album . '
			<p> Tags: ' . $tags . '
			<p style="opacity: 0.5;">' . $date . '</p>
			<div class="likeButtons"></div>
			<hr style="margin-top: 3.4em">
		</div>';
}
?>

<section id='searchByTagResults' style='font-size: 1.3em; margin-left: 10%; width: 40%;'>
	<?= $output?>
</section>


<script>
	$(function (){
		addLikes();
	});
</script>