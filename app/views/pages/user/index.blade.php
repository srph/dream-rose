@extends('templates.default')

@section('title') - Dashboard @stop

@section('content')
	<h4> User List </h4>
	<hr>

	<div class="row">
		<div class="col-md-6">
			@include('pages/user/partials.search-query')
		</div>
	</div>

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
						<td> {{ $user->Email }} </td>
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


		<div class="clearfix">
			<div class="pull-right">
				@if( Input::has('query') )
					<a href="{{ URL::route('admin.user.index') }}" class="btn btn-default">
						Go back
					</a>
				@endif
			</div>
			{{ $users->links('pages/user/partials.paginator') }}
		</div>
	@else
		<div class="alert alert-info">
			<p>
				@if( Input::has('query') )
					No such user exists. <a href="{{ URL::route('admin.user.index') }}" class="alert-link"> Go back to the full list. </a>
				@else
					No user has been registered yet.
				@endif
			</p>
		</div>
	@endif
@stop