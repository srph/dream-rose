@extends('templates.default')

@section('title') - Your characters @stop

@section('content')
	<h1> Your Characters </h1>
	<hr>

	@if( ! $auth->characters->count() )
		<div class="alert alert-info">
			<p> You have not yet created a character! </p>
		</div>
	@else
		<table class="table">
			<thead>
				<tr>
					<td> Name </td>
					<td> Level </td>
					<td> Job </td>
					{{-- <td> {{ Clan </td> --}}
				</tr>
			</thead>

			<tbody>
				@foreach($user->characters as $character)
					<tr>
						<td> {{ $character->name }} </td>
						<td> {{ $character->level }} </td>
						<td> {{ $character->getJobName() }} </td>
						{{-- <td> {{ $character->clan }} </td> --}}
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop