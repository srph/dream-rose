@extends('templates.default')

@section('title') - Vote 4 Points @stop

@section('content')
	<h1> Vote 4 Points </h1>
	<hr>
@stop

@section('scripts')
	{{ HTML::script('vendor/leptureeditor/vendor/codemirror.js') }}
	{{ HTML::script('vendor/leptureeditor/vendor/markdown.js') }}
	{{ HTML::script('vendor/leptureeditor/src/editor.js') }}
	{{ HTML::script('vendor/leptureeditor/src/intro.js') }}
	<script>
	</script>
@stop