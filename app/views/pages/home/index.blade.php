@extends('templates.default')

@section('title') - Home @stop

@section('content')
	<h4> News </h4>
	<hr>
	@if( $news->count() )
		@include('pages/home/partials.news')
	@else
		<div class="alert alert-info">
			<p> No <strong>news</strong> has been posted yet. Come back again for announcements! </p>
		</div>
	@endif

	<div class="row">
		<div class="col-md-6">
			<h4> Updates </h4>
			<hr>
			@if( $updates->count() )
				@include('pages/home/partials.updates')
			@else
				<div class="alert alert-info">
					<p> No <strong>updates</strong> has been posted yet. Come back again for announcements! </p>
				</div>
			@endif
		</div>

		<div class="col-md-6">
			<h4> Events </h4>
			<hr>
			@if( $events->count() )
				@include('pages/home/partials.events')
			@else
				<div class="alert alert-info">
					<p> No <strong>updates</strong> has been posted yet. Come back again for announcements! </p>
				</div>
			@endif
		</div>
	</div>
@stop