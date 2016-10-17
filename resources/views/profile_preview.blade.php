
 <?php 
 
 $user_pic = $user->profile_pic;
 $output_prof = explode("\\",$user_pic)
 
 
 ?>
<a href='javascript:history.back(1);'>Back</a>;

<h1>Info for user:</h1>

<h3>Profile picture:</h3>
<img style="width:250px; " src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />

<h3>Firstname: {{$user->firstname}}</h3>
<h3>Lastname: {{$user->lastname}}</h3>
<h3>Username: {{$user->username}}</h3>
<h3>Registered at: {{$user->created_at}}</h3>
<h3>Description: {{$user->description}}</h3>
