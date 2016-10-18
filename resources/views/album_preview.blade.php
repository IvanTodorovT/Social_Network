
 <?php 
 
 $album_pic = $album->cover_photo;
 $output_prof = explode("\\",$album_pic)
 
 
 ?>
 
 
 
  

<!DOCTYPE html>
<html>
<body>

 
<style>

html {
background-color: #f5f8fa;
}

hr.style17 {
    padding: 0;
  border: none; 
  border-top: medium double #8c8c8c; 
  color: black; 
  text-align: center; 
}
hr.style17:after {
 content: "§"; 
  display: inline-block; 
  position: relative; 
  top: -0.7em; 
  font-size: 1.5em; 
  padding: 0 0.25em; 
  background: #fff; 
}
</style>
 
 <div style="background-color: white;height:2em;width:100%"></div>
<a style='display: inline-block;text-decoration: none;color:2196d3;margin-top:1em;font-size:2em;margin-left:1em;' href='javascript:history.back(1);'>Back</a><br><br />
<hr class="style17">
<h1 style="margin-left: 14.5em;">Information for album:</h1>


<img style="width:250px;height:250px;margin-left:31em; " src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" /><br />

<h3  style="display: inline;">Name:</h3><h1 style="display: inline;"> {{$album->name}} &nbsp&nbsp</h1>
<h3 style="display: inline;">Description:</h3><h1 style="display: inline;"> {{$album->description}}</h1>

<hr  class = "style17" />
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



$postove = DB::select('SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.created_at,p.id as pid,p.photo,p.text,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a
	 on p.album_id= a.id where a.id= ? order by p.created_at desc ',array($album->id));
    
    
foreach ($postove as $post):
$post_photo = $post->photo;
$output_post = explode("\\",$post_photo);


$user_pic = $post->profile_pic;
$output_prof = explode("\\",$user_pic)


?>

	<div class="post" id=<?= $post->pid; ?> style="width:100%;"> 	
		
		
		<img style="display:inline;margin-left:1em;margin-top:1em; width:50px; height:50px;" src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a style="font-size: 2em;margin-left:1em;display:inline;text-decoration: none;" href="{{ URL('profile_preview/'.$post->uid )}}""><?=  $post->firstname,' ', $post->lastname;?></a><h2 style="display: inline;"> say: </h2><h2 style="display: inline;">{{ $post->text}}</h2><br /><br />
		
		<img style="width:150px; height:150px;margin-left:35em;" src="..\..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
			<p>Posted at:{{$post->created_at}}</p>
		
		<div class='likeButtons'></div>
	
	</div>
<hr />


    <?php endforeach;?>