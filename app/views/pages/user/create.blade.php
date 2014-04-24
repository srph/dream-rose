@extends('templates.default')

@section('content')
	<h1> Create an Account </h1>
	<hr>

	<div class="alert alert-warning">
		<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
	</div>

	{{ Form::open(array('url' => 'register', 'method' => 'POST')) }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Username <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="username">
					@if( $errors->has('username') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('username') }} </p>
						</div>
					@endif
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Email <span class="off"> * </span> </label>
					<input type="email" class="form-control" name="email">
					@if( $errors->has('email') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('email') }} </p>
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="form-group">
			<label> Password <span class="off"> * </span> </label>
			<input type="password" class="form-control" name="password">
			@if( $errors->has('password') )
				<p> </p>
				<div class="alert alert-danger">
					<p> {{ $errors->first('password') }} </p>
				</div>
			@endif
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> First Name </label>
					<input type="text" class="form-control" name="fname">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Last Name </label>
					<input type="text" class="form-control" name="lname">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label> Mother's Last Name (Security Question) <span class="off"> * </span> </label>
			<input type="password" class="form-control" name="mname">
			@if( $errors->has('mname') )
				<p> </p>
				<div class="alert alert-danger">
					<p> {{ $errors->first('mname') }} </p>
				</div>
			@endif
		</div>

		<button type="submit" class="btn btn-success">
			<i class="glyphicon glyphicon-ok"></i>
			Create Account!
		</button>
	{{ Form::close() }}
@stop