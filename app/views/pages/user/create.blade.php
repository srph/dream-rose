@extends('templates.default')

@section('content')
	<h1> Create an Account </h1>
	<hr>

	{{ Form::open(array('url' => 'register', 'method' => 'POST')) }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Username </label>
					<input type="text" class="form-control" name="username">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Email </label>
					<input type="email" class="form-control" name="email">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label> Password </label>
			<input type="password" class="form-control" name="password">
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
			<label> Mother's Name (Security Question) </label>
			<input type="password" class="form-control" name="mname">
		</div>

		<button type="submit" class="btn btn-success">
			<i class="glyphicon glyphicon-ok"></i>
			Create Account!
		</button>
	{{ Form::close() }}
@stop