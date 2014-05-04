@extends('templates.default')

@section('title') - Home @stop

@section('content')
	<h4> News </h4>
	<hr>
	@if( $news->count() )
		<div class="row">
				@foreach($news as $article)
					<div class="col-md-4">
						<div class="thumbnail" style="height: 290px;">
							<img src="{{ $article->getImageURL() }}" width="238" height="162">
	
							<div class="caption">
								<h5> <strong> {{ $article->title }} </strong> </h5>
	
								<p> {{ $article->summary }} </p>
							</div>
						</div>
					</div>
				@endforeach
		</div>
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
				<div class="thumbnail">
					@foreach($updates as $index => $update)
						@if($index == 0)
							<img src="{{ $update->getImageURL() }}" width="387" height="162">

							<div class="caption">
								<h5> <strong> {{ $update->title }} </strong> </h5>
								<p> {{ $update->summary }} </p>
							</div>
						@else
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="{{ URL::to('news/' . $article->id) }}"> {{ $update->title }} </a></li>
							</ul>
						@endif
					@endforeach
				</div>
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
				<div class="thumbnail">
					@foreach($events as $index => $event)
						@if($index == 0)
							<img src="{{ $event->getImageURL() }}" width="387" height="162">

							<div class="caption">
								<h5> <strong> {{ $event->title }} </strong> </h5>
								<p> {{ $event->summary }} </p>
							</div>
						@else
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="{{ URL::to('news/' . $article->id) }}"> {{ $event->title }} </a></li>
							</ul>
						@endif
					@endforeach
				</div>
			@else
				<div class="alert alert-info">
					<p> No <strong>updates</strong> has been posted yet. Come back again for announcements! </p>
				</div>
			@endif
		</div>
	</div>
@stop