@extends('templates.default')

@section('title') - Downloads @stop

@section('content')
	<h1> Downloads </h1>
	<hr>
	
	<div class="text-center">
		<a href="{{ url( Config::get('dream.downloads.client') ) }}" class="btn btn-info btn-lg">
			<i class="glyphicon glyphicon-cloud"></i>
			Download Client
		</a>
	</div>
	<p></p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget elit porttitor, venenatis eros eget, auctor elit. Ut consequat auctor velit eu porta. Nulla laoreet, purus viverra tincidunt facilisis, est nunc faucibus nibh, tincidunt feugiat arcu nisi nec ligula. Pellentesque pretium in lacus non condimentum. Etiam elementum lacinia nulla. Sed ut placerat massa, ac sollicitudin dui. Praesent venenatis neque ut velit sollicitudin, nec rutrum massa luctus. Cras in egestas lacus, vel egestas ligula. Sed porttitor lorem fermentum, volutpat odio et, dignissim nisl. </p>
@stop