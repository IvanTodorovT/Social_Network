<?php 
 $user_pic = $user->profile_pic;
 $output_prof = explode("\\",$user_pic)

 ?>
 

 
 
 </style>
<!DOCTYPE html>
<html>
<body>

 
<style>
html {background-color: f5f8fa;}

</style>
<div style="background-color: white;height:2em;width:100%"></div>
<a style='display: inline-block;color:2196d3;margin-top:1em;font-size:2em;margin-left:1em;' href='javascript:history.back(1);'>Back</a><br><br />
<hr />
<h1 style="margin-left: 1em;">Information for user</h1>

<div style="margin-left: 2em;">
<div style="width:250px;height:250px;border: 2px solid black"><img style="width:250px; height:250px; display:inline; " src="..\..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" /></div><br /><br />

<h3 style="display: inline;">Firstname: </h3><h2 style="display: inline;">{{$user->firstname}}</h2><br /><br />
<h3 style="display: inline;">Lastname: </h3><h2 style="display: inline;">{{$user->lastname}}</h2><br /><br />
<h3 style="display: inline;">Username: </h3><h2 style="display: inline;">{{$user->username}}</h2><br /><br />
<h3 style="display: inline;">Registered at:: </h3><h2 style="display: inline;">{{$user->created_at}}</h2><br /><br />
<h3 style="display: inline;">Description: </h3><h2 style="display: inline;">{{$user->description}}</h2><br /><br />

</div>
</body>
</html>