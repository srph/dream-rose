@extends('templates.default')

@section('title')
 - {{ $news->title }}
@stop

@section('content')
	<img src="{{ $news->getImageURL() }}" width="{{ Config::get('dream.news.sizes.width') }}">
	<h4> <small> {{ $news->type->name }} </small>{{ $news->title }} </h4>
	<hr>

	{{ $news->content }}

	<hr>
	<h5>
		<small>
			Posted by <strong>{{ $news->user->Account }}</strong>
			{{ Carbon\Carbon::createFromTimeStamp(strtotime($news->created_at))->diffForHumans() }}
		</small>
	</h5> 
@stop