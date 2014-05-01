@extends('templates.default')

@section('title') - Item Mall @stop

@section('content')
	<h4> Item Mall </h4>
	<hr>

	<ul class="nav nav-tabs" style="font-size: 10px;">
		@foreach($categories as $index => $category)
			<li @if($index == 0) class="active" @endif>
				<a href="#{{ $category->name }}"> {{ ucfirst($category->name) }} </a>
			</li>
		@endforeach
	</ul>

	<div class="tab-content">
		@foreach($categories as $index => $category)
			<div class="tab-pane @if($index == 0) active @endif" id="{{ $category->name }}">
			</div>
		@endforeach
	</div>
@stop