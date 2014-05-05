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

@if( $v4us->count() &&
	!( Request::is('panel/vote') || Request::is('panel/vote/*') ) )
	@include('templates/modules/side.vote')
@endif

@include('templates/modules/side.facebook')