<div class="panel panel-default">
	<div class="panel-heading"> Welcome, {{ $auth->username }}! </div>

	<div class="list-group">
		<a href="{{ URL::to('panel/account-overview') }}" class="list-group-item @if( Request::is('panel/account-overview') ) active @endif">
			<small> <i class="glyphicon glyphicon-lock"></i> </small>
			Account Overview
		</a>
		
		<a href="{{ URL::to('panel/your-characters') }}" class="list-group-item @if( Request::is('panel/your-characters') ) active @endif">
			<small> <i class="glyphicon glyphicon-list"></i> </small>
			Characters
		</a>			
		
		<a href="#" class="list-group-item">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			Mall
		</a>
		
		<a href="{{ URL::to('panel/vote') }}" class="list-group-item @if( Request::is('panel/vote') ) active @endif">
			<small> <i class="glyphicon glyphicon-star"></i> </small>
			Vote 4 Points
		</a>				
		
		<a href="{{ URL::to('logout') }}" class="list-group-item @if( Request::is('') ) active @endif">
			<small> <i class="glyphicon glyphicon-remove"></i> </small>
			Logout
		</a>
	</div>
	
</div>