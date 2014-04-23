<div class="panel panel-default">
	<div class="panel-heading"> Welcome, {{ $auth->username }}! </div>

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