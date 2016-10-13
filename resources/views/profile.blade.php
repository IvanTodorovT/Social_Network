@extends('layouts.app')

@section('content')




</head>
<body>


<a href="wall" style="margin-left:40em;">Wall</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="#" style="margin-left:3em;">Edit</a>
<a href="search" style="margin-left:3em;">Search</a>

<div style="margin-left: 3em;">
<h1 >Profile page:</h1>
		<div class="container" style="margin-top:3em;">
			<label for="">First name: {{  Auth::user()->firstname }}</label> <br>
			<label for="">Last name: {{  Auth::user()->lastname }}</label> <br>
			<label for="">Username: {{  Auth::user()->username }}</label> <br>
			<label for="">Created at: {{  Auth::user()->created_at }}</label><br> 
			<label for="">Email: {{  Auth::user()->email }}</label><br>
			<label for="">Last info update: {{  Auth::user()->updated_at }}</label> <br>
			
		</div>



<form method="post" action="{{route('post.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input style="margin-left: 3.5em;" type="text" name="content" placeholder="Enter your post here:"/>
	
  
	
	<input type="submit" />
	
	
	
</form>



<div id='msg' style="margin-top:3em;"></div>
<form method='post' enctype="multipart/form-data">

<section id='uploadForm'></section>
<script>
	$.get("upload", function(r){
		$('#uploadForm').html(r);
	});
</script>


<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   
   	<div>
   		<label for='file'>Upload:</label>
   		<input style='display: inline-block' id='file' type="file" name="file">
   	</div>
		<div>
	        <textarea rows="5" cols="50" name='text' placeholder='What do you think?'></textarea>
		</div>
	<div>
		<p> Would you like to select tags for your photo? </p>
		<select id='tag1' name='tag1'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
	       </select>
		<select name='tag2'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
	       </select>
		<select name='tag3'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
		</select>
	</div>
	<input type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<script>
$(function (){
	$("form").submit(function(e) {

	    var formData = new FormData($(this)[0]);

	    $.ajax({
	        url: window.location.pathname + "/upload",
	        type: 'POST',
	        data: formData,
	        async: true,
	        success: function (data) {
	            if (data){
					$("#msg").html("<h3>" + data + "</h3><hr>");
	            }
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	    
	    e.preventDefault();
	});
});
</script>















	</div>
	

	
	
</body>















@endsection
