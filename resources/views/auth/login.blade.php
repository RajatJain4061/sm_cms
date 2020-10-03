@extends('layout.app')
@section('title', __('Login'))
@section('content')
	<link rel="stylesheet" type="text/css" href="{{ url('assets/login/style.css') }}">
	<div class="login mt-5">
		<h3 align="center">Login</h3>
		@if(Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<p>{{Session::get('error')}}</p>
				</button>
			</div>
		@endif
		<form class="frm mt-4" method="post" action="{{ url('login') }}">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
	  			<label for="email">Email :</label>
	  				<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
	  				@if ($errors->has('email'))
                        <span class="help-block">
                        	<strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
			</div>
			<div class="form-group">
			  	<label for="password">Password:</label>
			  	<input type="password" name="password" class="form-control" id="password" placeholder="Password">
			  	@if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
			<input type="reset" class="btn btn-danger" value="Reset">
		</form>
	</div>
@endsection