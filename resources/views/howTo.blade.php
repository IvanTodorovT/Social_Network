@extends('layouts.app')
@section('content')


<p>This is how an upload form is added</p>

<section id='uploadForm'></section>

<script type="text/javascript" src="js/addUploadForm.js"></script>

<p>The path to the uploaded images is:</p>
<p>$path = resource_path() . DIRECTORY_SEPARATOR . 'uploads';</p>
<br><hr><br>




<p>This is how Like/Dislike/Comment buttons are added:</p>

<div class='likeButtons'></div>

<p> Parent class must contain class='album'||'post'||'comment' and attribute id=$id (ex. $post->id)</p>
<br><hr><br>




<div class='comments'></div>




<p> PHP to add Likes/Dislike/Comments with count and changing colors: </p>
<p> once: </p>

		$numbers = Likes::getNumbers('post_status', 'post_id', $idArray);
		$numbers['comments'] = Comments::getCommentsCount('post_comments', 'post_id', $idArray);
		
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
		
<p> for every $post </p>

				<div class="likeButtons">
					<i style="color: green;" class="fa fa-thumbs-up ' . $likeStatus . '" aria-hidden="true"></i>
					<span class="countLikes">' . $likes . '</span>
					<i style="color: red;" class="fa fa-thumbs-down ' . $dislikeStatus . '" aria-hidden="true"></i>
					<span class="countDislikes">' . $dislikes . '</span>
					<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
					<span class="countComments">' . $comments . '</span>
				</div>
				
				<p> OR AS BLADE: </p>
				
				<div class="likeButtons">
					<i style="color: green;" class="fa fa-thumbs-up ' . $likeStatus . '" aria-hidden="true"></i>
					<span class="countLikes">{{$likes}}</span>
					<i style="color: red;" class="fa fa-thumbs-down ' . $dislikeStatus . '" aria-hidden="true"></i>
					<span class="countDislikes">{{$dislikes}}</span>
					<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
					<span class="countComments">{{$comments}} </span>
				</div>
@stop