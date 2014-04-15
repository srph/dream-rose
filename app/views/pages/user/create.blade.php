@extends('templates.default')

@section('content')
	<h1> Create an Account </h1>
	<hr>

	<form>
		<div class="form-group">
			<label> Username </label>
			<input type="text" class="form-control" name="username">
		</div>

		<div class="form-group">
			<label> Password </label>
			<input type="password" class="form-control" name="password">
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> First Name </label>
					<input type="text" class="form-control" name="first_name">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Last Name </label>
					<input type="text" class="form-control" name="last_name">
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-success">
			<i class="glyphicon glyphicon-ok"></i>
			Create Account!
		</button>
	</form>
@stop