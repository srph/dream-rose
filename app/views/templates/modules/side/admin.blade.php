<div class="panel panel-default">
	<div class="panel-heading"> Admin Panel </div>

	<ul class="list-group">
		<li class="list-group-item">
			<small> <i class="glyphicon glyphicon-user"></i> </small>
			<a href="{{ URL::to('panel/account-overview') }}">
				Manage Users
			</a>
		</li>

		<li class="list-group-item">
			<small> <i class="glyphicon glyphicon-pencil"></i> </small>
			<a href="{{ URL::to('panel/your-characters') }}">
				Manage Announcements
			</a>
		</li>

		<li class="list-group-item">
			<small> <i class="glyphicon glyphicon-pushpin"></i> </small>
			<a href="#">
				Manage Slides
			</a>
		</li>

		<li class="list-group-item">
			<small> <i class="glyphicon glyphicon-gift"></i> </small>
			<a href="{{ URL::to('panel/vote') }}">
				Manage Mall
			</a>
		</li>
	</ul>
	
</div>