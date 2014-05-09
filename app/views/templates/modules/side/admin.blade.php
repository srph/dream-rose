<div class="panel panel-default panel-lara">
	<div class="panel-heading"> Management </div>

	<div class="list-group">
		<a href="{{ URL::to('admin/user') }}"
			class="list-group-item @if( Request::is('admin/user') || Request::is('admin/user/*') ) active @endif">
			<small> <i class="glyphicon glyphicon-lock"></i> </small>
			Manage Users
		</a>
		
		<a href="{{ URL::to('admin/news') }}"
			class="list-group-item @if( Request::is('admin/news/*') || Request::is('admin/news') ) active @endif">
			<small> <i class="glyphicon glyphicon-pencil"></i> </small>
			Manage News
		</a>			
		
		<a href="{{ URL::to('admin/slide') }}"
			class="list-group-item @if( Request::is('admin/slide') || Request::is('admin/slide/*') ) active @endif">
			<small> <i class="glyphicon glyphicon-picture"></i> </small>
			Manage Slides
		</a>

		<a href="{{ URL::to('admin/vote-links') }}"
			class="list-group-item @if( Request::is('admin/vote-links') || Request::is('admin/vote-links/*') ) active @endif">
			<small> <i class="glyphicon glyphicon-star"></i> </small>
			Manage Vote Links
		</a>
		
		<a href="{{ URL::to('admin/item') }}"
			class="list-group-item @if( Request::is('admin/item') || Request::is('admin/item/*') ) active @endif">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			Manage Mall
		</a>
	</div>
	
</div>