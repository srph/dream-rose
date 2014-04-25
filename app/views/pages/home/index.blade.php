@extends('templates.default')

@section('title') - Home @stop

@section('content')
	<h4> News </h4>
	<hr>
	<div class="row">
		@foreach($news as $article)
			<div class="col-md-4">
				<div class="thumbnail" style="height: 275px;">
					<img src="{{ $article->getImageURL() }}" width="238" height="162">

					<div class="caption">
						<h5> <strong> {{ $article->title }} </strong> </h5>

						<p> {{ $article->summary }} </p>
					</div>

					<small> by {{ $article->user }} </small>
				</div>
			</div>
		@endforeach
	</div>

	<div class="row">
		<div class="col-md-6">
			<h4> Updates </h4>
			<hr>
			<div class="thumbnail">
				<img src="{{ $updates[0]->getImageURL() }}" width="387" height="162">

				<div class="caption">
					<h5> <strong> {{ $updates[0]->title }} </strong> </h5>
					<p> {{ $updates[0]->summary }} </p>
				</div>

				<ul class="nav nav-pills nav-stacked">
					@foreach($updates as $index => $article)
						@if($index > 0)
							<li class="active"><a href="{{ URL::to('news/' . $article->id) }}"> {{ $article->title }} </a></li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>

		<div class="col-md-6">
			<h4> Events </h4>
			<hr>
			<div class="thumbnail">
				<img src="{{ $updates[0]->getImageURL() }}" width="387" height="162">

				<div class="caption">
					<h5> <strong> {{ $events[0]->title }} </strong> </h5>
					<p> {{ $events[0]->summary }} </p>
				</div>

				<ul class="nav nav-pills nav-stacked">
					@foreach($events as $index => $article)
						@if($index > 0)
							<li class="active"><a href="{{ URL::to('news/' . $article->id) }}"> {{ $article->title }} </a></li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@stop