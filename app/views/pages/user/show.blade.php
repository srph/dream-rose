@extends('templates.default')

@section('title') - Account Overview @stop

@section('content')
	<h1> Account Overview </h1>
	<hr>

	<div class="alert alert-info">
		<p>
			You have <strong>{{ $user->vp }}</strong> <em>vote points</em>, and
			<strong>{{ count($user->characters) }}</strong> <em>character(s)</em>.
		</p>
	</div>

	@if(Session::has('user-update-success'))
		<div class="alert alert-success">
			<p> You have successfully updated your account! </p>
		</div>
	@endif

	{{ Form::open(array('url' => 'panel/user/update', 'method' => 'post')) }}

		<input type="hidden" name="username" value ="{{{ $user->username }}}">
		<input type="hidden" name="email" value ="{{{ $user->Email }}}">
		<input type="hidden" name="mname" value ="{{{ $user->MotherLName }}}">
		

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label> Username </label>
					<input disabled="disabled" class="form-control" type="text" value="{{{ $user->username }}}">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Email </label>
					<input disabled="disabled" class="form-control" type="email" value="{{{ $user->Email }}}">
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Old Password </label>
					<input class="form-control" name="old_password" type="password">
					@if(Session::has('user-update-error'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ Session::get('user-update-error') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> New Password </label>
					<input class="form-control" name="password" type="password">
					@if($errors->has('password'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('password') }} </p>
						</div>
					@endif
				</div>
			</div>
		</div>

		<button class="btn btn-success" type="submit" id="update-btn">
			<i class="glyphicon glyphicon-ok"></i>
			Update
		</button>
	{{ Form::close() }}
@stop