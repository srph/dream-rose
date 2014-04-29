@extends('templates.default')

@section('title') - Vote 4 Points! @stop

@section('content')
	<h4> Vote 4 Points! </h4>
	<hr>

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
@stop