@extends('templates.default')

@section('title') - Your Item Orders @stop

@section('content')
	<h2> Your Item Orders </h2>
	<hr>

	@if( $orders->count() )
		<table class="table table-hover">
			<thead>
				<tr>
					<th> ID </th>
					<th> Item </th>
					<th> Date Bought </th>
					<th> Date Transacted </th>
				</tr>
			</thead>

			<tbody>
				@foreach($orders as $order)
					<tr>
						<td> {{ $order->id }} </td>
						<td> {{ $order->item->name }} </td>
						<td> {{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }} </td>
						<td> {{ $order->transacted }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>


		{{ $orders->links('pages/order/partials.paginator') }}
	@else
		<div class="alert alert-info">
			<p> No orders in queue! </p>
		</div>
	@endif
@stop