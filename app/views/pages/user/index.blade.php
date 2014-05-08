@extends('templates.default')

@section('title') - Dashboard @stop

@section('content')
	<h4> User List </h4>
	<hr>

	@if( $users->count() )
		<table class="table table-hover">
			<thead>
				<tr>
					<th> ID </th>
					<th> Username </th>
					<th> Email </th>
					<th> Character Count </th>
					<th> Actions </th>
				</tr>
			</thead>

			<tbody>
				@foreach($users as $user)
					<tr>
						<td> {{ $user->id }} </td>
						<td> {{ $user->username }} </td>
						<td> {{ $user->email }} </td>
						<td> {{ $user->characters->count() }} </td>
						<td>
							<a href="{{ URL::route('admin.user.edit', $user->id) }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info">
			<p> No users exist. </p>
		</div>
	@endif
@stop