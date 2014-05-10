<div class="panel panel-default panel-lara">
	<div class="panel-heading"> Welcome, {{ $auth->username }}! </div>

	<div class="list-group">
		<a href="{{ URL::to('panel/account-overview') }}" class="list-group-item @if( Request::is('panel/account-overview') ) active @endif">
			<small> <i class="glyphicon glyphicon-lock"></i> </small>
			Account Overview
		</a>
		
		<a href="{{ URL::to('panel/your-characters') }}" class="list-group-item @if( Request::is('panel/your-characters') ) active @endif">
			<small> <i class="glyphicon glyphicon-list"></i> </small>
			Your Characters
		</a>
		
		<a href="{{ URL::to('panel/your-orders') }}" class="list-group-item @if( Request::is('panel/your-orders') ) active @endif">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			Your Item Orders
		</a>
		
		<a href="{{ URL::to('panel/mall') }}" class="list-group-item @if( Request::is('panel/mall') ) active @endif">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			Item Mall
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