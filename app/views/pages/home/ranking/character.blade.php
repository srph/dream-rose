@extends('templates.default')

@section('title') - User Ranking @stop

@section('content')
	<h1> Top 10 Characters </h1>
	<hr>	

	<table class="table">
		<thead>
			<tr>
				<td> Rank </td>
				<td> Name </td>
				<td> Level </td>
				<td> Job </td>
				{{-- <td> {{ Clan </td> --}}
			</tr>
		</thead>

		<tbody>
			@foreach($characters as $index => $character)
				<tr>
					<td> {{ $index + 1 }} </td>
					<td> {{ $character->name }} </td>
					<td> {{ $character->level }} </td>
					<td> {{ $character->getJobName() }} </td>
					{{-- <td> {{ $character->clan }} </td> --}}
				</tr>
			@endforeach
		</tbody>
	</table>
@stop