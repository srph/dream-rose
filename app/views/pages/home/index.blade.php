@extends('templates.default')

@section('title') - Home @stop

@section('content')
	<h4> News </h4>
	<hr>
	<div class="row">
		@foreach($news as $article)
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="{{ $article->getImageURL() }}" width="{{ Config::get('dream.news.sizes.width') }}" height="{{ Config::get('dream.news.sizes.height') }}">

					<div class="caption">
						<h5> <strong> {{ $article->title }} </strong> </h5>

						<p> {{ $article->content }} </p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@stop