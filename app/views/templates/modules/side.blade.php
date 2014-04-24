@if( Auth::guest() )
	@if( ! Request::is('register') )
		@include('templates/modules/side.login')
	@endif
@else
	@include('templates/modules/side.panel')
	
	@if( Auth::user()->isGM() )
		@include('templates/modules/side.admin')
	@endif
@endif

@include('templates/modules/side.vote')