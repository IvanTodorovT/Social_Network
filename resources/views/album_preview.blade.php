
 <?php 
 
 $album_pic = $album->cover_photo;
 $output_prof = explode("\\",$album_pic)
 
 
 ?>
<a href='javascript:history.back(1);'>Back</a>;

<h1>Info for album:</h1>

<h3>Cover picture:</h3>
<img style="width:250px; " src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />

<h3>Name: {{$album->name}}</h3>
<h3>Description: {{$album->description}}</h3>
<?php 
/*   $postove =	DB::table('albums as a')
    ->join('posts as p', function($join)
   
    {
    	$join->on('a.id', '=', 'p.album_id');
    })
    ->select('a.id AS aid','p.id AS pid','p.text','p.photo')
    ->where('a.id', '=', 10)
    ->get();
     */



$postove = DB::select('SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.id as pid,p.photo,p.text,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a
	 on p.album_id= a.id where a.id= 10 ');
    
    
foreach ($postove as $post):
$post_photo = $post->photo;
$output_post = explode("\\",$post_photo);


$user_pic = $post->profile_pic;
$output_prof = explode("\\",$user_pic)


?>

	<div class="post" id=<?= $post->pid; ?> style="width: 60%;"> 	
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a href="{{ URL('profile_preview/'.$post->uid )}}""><?=  $post->firstname,' ', $post->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
		
		
		<div class='likeButtons'></div>
	
	</div>



    <?php endforeach;?>