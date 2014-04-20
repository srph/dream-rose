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
@else
	@if(!empty($user))
		<div class="panel panel-default">
			<div class="panel-heading"> Welcome, {{ $user->username }}! </div>

			<ul class="list-group">
				<li class="list-group-item">
					<small> <i class="glyphicon glyphicon-lock"></i> </small>
					<a href="{{ URL::to('panel/account-overview') }}">
						Account Overview
					</a>
				</li>

				<li class="list-group-item">
					<small> <i class="glyphicon glyphicon-list"></i> </small>
					<a href="{{ URL::to('panel/your-characters') }}">
						Characters
					</a>
				</li>

				<li class="list-group-item">
					<small> <i class="glyphicon glyphicon-gift"></i> </small>
					<a href="#">
						Mall
					</a>
				</li>

				<li class="list-group-item">
					<small> <i class="glyphicon glyphicon-star"></i> </small>
					<a href="{{ URL::to('panel/vote') }}">
						Vote 4 Points
					</a>
				</li>
				
				<li class="list-group-item">
					<small> <i class="glyphicon glyphicon-remove"></i> </small>
					<a href="{{ URL::to('logout') }}">
						Logout
					</a>
				</li>
			</ul>
		</div>
	@endif
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
				remember = ($('input[name=remember]').is(':checked')) ? true : false,
				data = {
					'_token': token.val(),
					'username': username.val(),
					'password': password.val(),
					'remember': remember
				};

				// console.log(remember.val());

			err.hide();

			$.post(url, data).success(function(data) {
				console.log(data);
				if(data.status) {
					window.location.reload();
				} else {
					console.log('wat');
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