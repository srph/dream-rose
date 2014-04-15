<nav class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navigation">
			<span class="sr-only"> Toggle </span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<a href="{{ URL::to('/') }}" class="navbar-brand">Dream Rose</a>
	</div>

	<div class="collapse navbar-collapse" id="navigation">
		<ul class="nav navbar-nav">
			<li> <a href="{{ URL::to('/') }}"> Home </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Register </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Downloads </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Game Info </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Support </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Forums </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Rankings </a> </li>
		</ul>
	</div>
</nav>