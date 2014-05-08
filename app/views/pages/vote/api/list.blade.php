@extends('templates.default')

@section('title') - Vote 4 Points! @stop

@section('content')
	<h4> Vote 4 Points! </h4>
	<hr>

	@if( $links->count() )
		<div class="alert alert-info">
			<p> By voting us in one of the links below, we grant you <strong>{{ Config::get('dream.links.points') }}</strong> points in exchange. Thank you for the support! </p>
		</div>
		@foreach($links as $index => $link)
			@if( $index % 2 == 0 || $index == 0 )
				<div class="row text-center">
			@endif

			<div class="col-md-4">
				<a href="{{ URL::to('panel/vote/response/' . $link->id) }}">
					<img src="{{ $link->getImageURL() }}">
				</a>
			</div>
			

			@if( $index % 2 )
				</div>
			@endif
		@endforeach
	@else
		<div class="alert alert-info">
			<p> Thank you the support, however vote links are yet to be available. Please do come back again later! </p>
		</div>
	@endif

@stop