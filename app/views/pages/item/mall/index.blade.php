@extends('templates.default')

@section('title') - Item Mall @stop

@section('content')
	<h2> Item Mall </h2>
	<hr>

	@if( Session::has('item-transaction-error') )
		<div class="alert alert-danger">
			@if( !Session::get('item-transaction-error') == '')
				{{ Session::get('item-transaction-error') }}
			@else
				<p> An error had occured. </p>
			@endif
		</div>
	@endif

	@if( Session::has('item-transaction-success') )
		<div class="alert alert-success">
			<p> You have successfully purchased <strong>{{ Session::get('item-transaction-success') }}</strong>  </p>
		</div>
	@endif

	@include('pages/item/mall/partials.category')
@stop