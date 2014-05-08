@extends('templates.default')

@section('title')
	- Edit {{{ $user->username }}}
@stop

@section('content')
	<h1> Edit {{{ $user->username }}} </h1>
	<hr>

	<div class="alert alert-info">
		<p>
			You have <strong>{{ $user->vp }}</strong> <em>vote points</em>, <strong>{{ $user->dp }}</strong>
			<em>donation points</em>, and <strong>{{ count($user->characters) }}</strong> <em>character(s)</em>.
		</p>
	</div>

	@if(Session::has('user-updated-success'))
		<div class="alert alert-success">
			<p> Account has been successfully updated! </p>
		</div>
	@endif

	{{ Form::open(array('route' => array('admin.user.update', $user->id), 'method' => 'PUT')) }}

		<input type="hidden" name="username" value ="{{{ $user->username }}}">
		<input type="hidden" name="mname" value ="{{{ $user->MotherLName }}}">
		

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label> Username </label>
					<input disabled="disabled" class="form-control" type="text" value="{{{ $user->username }}}">
					<p class="help-block"> Be advised that changing this field can result to unexpected effects. </p>
					@if($errors->has('username'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('username') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Email </label>
					<input class="form-control" type="email" name="email" value="{{{ $user->Email }}}">
					<p class="help-block"> Will not proc email activation upon changing </p>
					@if($errors->has('email'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('email') }} </p>
						</div>
					@endif
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Old Password </label>
					<input class="form-control" name="old_password" type="password" value="{{ $user->MD5PassWord }}">
					<p class="help-block"> Do not change this. </p>
					@if(Session::has('user-updated-error'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ Session::get('user-updated-error') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> New Password </label>
					<input class="form-control" name="password" type="password">
					<p class="help-block"> The user's new password. Will update the user's password upon fill and save. </p>
					@if($errors->has('password'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('password') }} </p>
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label> GM Level </label>
					<input class="form-control" type="text" name="gm_lv" value="{{{ $user->Right }}}">
					<p class="help-block"> Decides the user's level. 1 by default / user. </p>
					@if($errors->has('gm_lv'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('gm_lv') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Activated </label>
					<input class="form-control" name="activated" type="text" value="{{{ $user->MailIsConfirm }}}">
					<p class="help-block"> Whether account is verified or not. Either blank or 1. </p>
					@if($errors->has('activated'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('activated') }} </p>
						</div>
					@endif
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label> Donation Points </label>
					<input class="form-control" type="text" name="dp" value="{{ $user->dp }}">
					@if($errors->has('dp'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('dp') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Vote Points </label>
					<input class="form-control" name="vp" type="text" value="{{ $user->vp }}">
					@if($errors->has('vp'))
						<p></p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('vp') }} </p>
						</div>
					@endif
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> First Name </label>
					<input class="form-control" name="fname" type="text" value="{{{ $user->FirstName }}}">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Last Name </label>
					<input class="form-control" name="lname" type="text" value="{{{ $user->LastName }}}">
				</div>
			</div>
		</div>

		<div class="clearfix">
			<button class="btn btn-success" type="submit" id="update-btn">
				<i class="glyphicon glyphicon-ok"></i>
				Update
			</button>

			<div class="pull-right">
				<a class="btn btn-warning" href="{{ URL::route('admin.user.index') }}">
					<i class="glyphicon glyphicon-remove"></i>
					Cancel
				</a>
			</div>
		</div>
	{{ Form::close() }}
@stop