@extends('layouts.app')

@section('content')




</head>
<body>

		<div class="container">
			<label for="">First name: {{  Auth::user()->firstname }}</label> <br>
			<label for="">Last name: {{  Auth::user()->lastname }}</label> <br>
			<label for="">Username: {{  Auth::user()->username }}</label> <br>
			<label for="">Created at: {{  Auth::user()->created_at }}</label><br> 
			<label for="">Email: {{  Auth::user()->email }}</label><br>
			<label for="">Last info update: {{  Auth::user()->updated_at }}</label> <br>
			
		</div>







  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enter your post here:</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Text</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ old('text') }}" required autofocus>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    
                                   
                            
                                    @endif
                            </div>
                        </div>
                        
                        
                           

                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







	
	
	
</body>



@endsection
