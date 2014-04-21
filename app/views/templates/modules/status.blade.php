@if( @fsockopen( Config::get('dream.ip'), Config::get('dream.ports.char') ) )
	<li id="char-srv" data-toggle="tooltip" data-placement="left" title="Character Server is up!">
		<a href="#">
			<i class="glyphicon glyphicon-user" style="color: #33CC33;"></i>
		</a>
	</li>
@else
	<li id="char-srv" data-toggle="tooltip" data-placement="left" title="Character Server is down!">
		<a href="#">
			<i class="glyphicon glyphicon-user" style="color: #FF0000;"></i>
		</a>
	</li>
@endif

@if( @fsockopen( Config::get('dream.ip'), Config::get('dream.ports.world') ) )
	<li id="world-srv" data-toggle="tooltip" data-placement="bottom" title="World Server is up!">
		<a href="#">
			<i class="glyphicon glyphicon-globe" style="color: #33CC33;"></i>
		</a>
	</li>
@else
	<li id="world-srv" data-toggle="tooltip" data-placement="bottom" title="World Server is down!">
		<a href="#">
			<i class="glyphicon glyphicon-globe" style="color: #FF0000;"></i>
		</a>
	</li>
@endif

@if( @fsockopen( Config::get('dream.ip'), Config::get('dream.ports.login') ) )
	<li id="login-srv" data-toggle="tooltip" data-placement="right" title="Login Server is up!">
		<a href="#">
			<i class="glyphicon glyphicon-lock" style="color: #33CC33;"></i>
		</a>
	</li>
@else
	<li id="login-srv" data-toggle="tooltip" data-placement="right" title="Login Server is down!">
		<a href="#">
			<i class="glyphicon glyphicon-lock" style="color: #FF0000;"></i>
		</a>
	</li>
@endif