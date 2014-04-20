@if(Auth::guest())
	<div class="panel panel-default">
		<div class="panel-heading">	Login </div>

		<div class="panel-body">
			<div id="login-err" class="alert alert-danger hide">
				<p> Incorrect username / password </p>
			</div>
			<form method="POST" id="login-form">

				{{-- Token --}}
				{{ Form::token() }}

				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="yourname@">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="*****">
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
@else
	<div class="panel panel-default">
		<div class="panel-heading"> Panel </div>

		<div class="panel-body">
			Oy
		</div>
	</div>
@endif

<div class="panel panel-default">
	<div class="panel-heading">
		Vote 4 Us!
	</div>

	<div class="panel-body">
		<img src="http://placehold.it/230x150" alt="..." class="img-rounded img-responsive">
		<p></p>
		<img src="http://placehold.it/230x150" alt="..." class="img-rounded img-responsive">
	</div>
</div>

{{-- Login --}}
<script>
	// (function() {
		/* Login Function */
		var url = '{{ url('login')}}',
			err = $('#login-err'),
			token = $('input[name=_token]');

		function login() {
			var username = $('input[name=username]'),
				password = $('input[name=password]'),
				remember = $('input[name=remember]'),
				data = {
					'_token': token.val(),
					'username': username.val(),
					'password': password.val(),
					'remember': remember.val()
				};

				console.log(remember.val());

			err.hide();

			$.post(url, data).success(function(data) {
				if(data.status) {
					window.location.reload();
				} else {
					err.removeClass('hide');
				}
			});
		}

		var btn = $('#login-btn'),
			form = $('#login-form');

		btn.on('click', function(e) {
			e.preventDefault();
			login();
		});

		form.on('submit', function(e) {
			e.preventDefault();
			login();
		})
	// })();
</script>