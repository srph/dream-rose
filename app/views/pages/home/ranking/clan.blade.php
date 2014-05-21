@extends('templates.default')

@section('title') - Clan Ranking @stop

@section('content')
	<h1> Top 10 Clans </h1>
	<hr>

	@if( !$clans->count() )
		<div class="alert alert-info">
			<p> No characters exist in the game yet! </p>
		</div>
	@else
		<table class="table">
			<thead>
				<tr>
					<td> Rank </td>
					<td> Name </td>
					<td> Level </td>
					<td> Points </td>
				</tr>
			</thead>
	
			<tbody>
				@foreach($clans as $index => $clan)
					<tr>
						<td> {{ $index + 1 }} </td>
						<td> {{ $clan->name }} </td>
						<td> {{ $clan->level }} </td>
						<td> {{ $clan->points }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop