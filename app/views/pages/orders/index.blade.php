@extends('templates.default')

@section('title') - Manage Item Orders @stop

@section('content')
	<h4> Manage Item Orders </h4>
	<hr>

	{{ Form::open() }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label> Search (ID) </label>
					<input type="text" class="form-control" name="query" value="{{ Input::get('query') }}">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label> Filter </label>
					<select class="form-control" name="t">
						<option value="" @if(!Input::has('t')) selected @endif>(Select)</option>
						<option value="" @if(Input::has('t')) selected @endif>Transacted</option>
					</select>
				</div>
			</div>
		</div>
	{{ Form::close() }}

	@if( $orders->count() )
		<table class="table table-hover">
			<thead>
				<tr>
					<th> ID </th>
					<th> User </th>
					<th> Item </th>
					<th> Date Bought </th>
					<th> Date Transacted </th>
					<th> Actions </th>
				</tr>
			</thead>

			<tbody>
				@foreach($orders as $order)
					<tr>
						<td> {{ $order->id }} </td>
						<td> {{ $order->user->username }}</td>
						<td> {{ $order->item->name }} </td>
						<td> {{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }} </td>
						<td> {{ $order->transacted }} </td>
						<td>
							@if( !$order->trashed() )
								{{ Form::open(array('method' => 'POST', 'url' => 'admin/order/transact/' . $order->id)) }}
									<button type="submit" class="btn btn-default">
										<i class="glyphicon glyphicon-ok"></i>
									</button>
								{{ Form::close() }}
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>


		<div class="clearfix">
			{{ $orders->links() }}

			<div class="pull-right">
				@if( Input::has('query') )
					<a href="{{ URL::to('admin/order') }}" class="btn btn-default">
						Go back
					</a>
				@endif
			</div>
		</div>
	@else
		<div class="alert alert-info">
			<p> No orders in queue! </p>
		</div>
	@endif
@stop