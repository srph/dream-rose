@if( Auth::guest() )
	@if( ! Request::is('register') )
		@include('templates/modules/side.login')
	@endif
@else
	@include('templates/modules/side.panel')
@endif

@include('templates/modules/side.vote')