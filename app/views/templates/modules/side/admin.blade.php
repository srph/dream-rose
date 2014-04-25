<div class="panel panel-default">
	<div class="panel-heading"> Management </div>

	<div class="list-group">
		<a href="{{ URL::to('panel/account-overview') }}" class="list-group-item @if( Request::is('admin/dashboard') ) active @endif">
			<small> <i class="glyphicon glyphicon-lock"></i> </small>
			Dashboard
		</a>
		
		<a href="{{ URL::to('panel/news') }}" class="list-group-item @if( Request::is('admin/news') ) active @endif">
			<small> <i class="glyphicon glyphicon-list"></i> </small>
			Manage News
		</a>			
		
		<a href="{{ URL::to('admin/slide') }}"
			class="list-group-item @if( Request::is('admin/slide') ) active @endif">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			Manage Slides
		</a>
		
		<a href="{{ URL::to('panel/vote') }}" class="list-group-item @if( Request::is('admin/mall') ) active @endif">
			<small> <i class="glyphicon glyphicon-star"></i> </small>
			Manage Mall
		</a>
	</div>
	
</div>