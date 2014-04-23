@if( $server['char'] )
	<li id="char-srv" data-toggle="tooltip" data-placement="left" title="Character Server is up!">
		<a>
			<i class="glyphicon glyphicon-user on"></i>
		</a>
	</li>
@else
	<li id="char-srv" data-toggle="tooltip" data-placement="left" title="Character Server is down!">
		<a>
			<i class="glyphicon glyphicon-user off"></i>
		</a>
	</li>
@endif

@if( $server['world'] )
	<li id="world-srv" data-toggle="tooltip" data-placement="bottom" title="World Server is up!">
		<a>
			<i class="glyphicon glyphicon-globe on"></i>
		</a>
	</li>
@else
	<li id="world-srv" data-toggle="tooltip" data-placement="bottom" title="World Server is down!">
		<a>
			<i class="glyphicon glyphicon-globe off"></i>
		</a>
	</li>
@endif

@if( $server['login'] )
	<li id="login-srv" data-toggle="tooltip" data-placement="right" title="Login Server is up!">
		<a>
			<i class="glyphicon glyphicon-lock on"></i>
		</a>
	</li>
@else
	<li id="login-srv" data-toggle="tooltip" data-placement="right" title="Login Server is down!">
		<a>
			<i class="glyphicon glyphicon-lock off"></i>
		</a>
	</li>
@endif