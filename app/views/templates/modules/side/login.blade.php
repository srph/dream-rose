	<div class="panel panel-default">
		<div class="panel-heading">	Login </div>

		<div class="panel-body">
			<div id="login-scs" class="alert alert-danger">
				<p> Login success! Loading.... </p>
			</div>

			<div id="login-err" class="alert alert-danger">
				<p> Incorrect username / password </p>
			</div>
			<form method="POST" id="login-form">

				{{-- Token --}}
				{{ Form::token() }}

				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="yourname@">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="*****">
				</div>

				<div class="form-group">
					<label>
						<input type="checkbox" name="remember">
						Remember Me
					</label>
				</div>

				<div class="form-group">
					<button type="button" id="login-btn" class="btn btn-success btn-block">
						<i class="glyphicon glyphicon-ok"></i>
						Login
					</button>
				</div>
			</form>
		</div>
	</div>