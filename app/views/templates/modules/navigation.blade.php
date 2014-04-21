<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navigation">
			<span class="sr-only"> Toggle </span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<a href="{{ URL::to('/') }}" class="navbar-brand"> {{ Config::get('dream.name') }} </a>
	</div>

	<div class="collapse navbar-collapse" id="navigation">
		<ul class="nav navbar-nav">
			<li> <a href="{{ URL::to('/') }}"> Home </a> </li>
			@if(Auth::guest()) <li> <a href="{{ URL::to('register') }}"> Register </a> </li> @endif
			<li> <a href="{{ URL::to('downloads') }}"> Downloads </a> </li>
			<li> <a href="{{ URL::to('info') }}"> Game Info </a> </li>
			<li> <a href="{{ URL::to('/') }}"> Support </a> </li>
			<li> <a href="{{ URL::to('/forum') }}"> Forums </a> </li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Rankings </a>
				<ul class="dropdown-menu">
					<li> <a href="{{ URL::to('/clan-ranking') }}"> Clan Ranking </a> </li>
					<li> <a href="{{ URL::to('/player-ranking') }}"> Player Ranking </a> </li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			@include('templates/modules.status')
		</ul>
	</div>
</nav>