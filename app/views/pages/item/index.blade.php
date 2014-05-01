@extends('templates.default')

@section('title') - Manage Items @stop

@section('content')
	<h4> Manage Items </h4>
	<hr>

	@if( Session::has('item-deleted-success') )
		<div class="alert alert-success">
			<p> The <strong>slide</strong> has been successfully <strong>deleted</strong>! </p>
		</div>
	@endif

	@if( Session::has('item-stored-success') )
		<div class="alert alert-success">
			<p> The <strong>slide</strong> has been successfully <strong>posted</strong>! </p>
		</div>
	@endif

	@if( $items->count() )
		<div class="form-group">
			<a href="{{ URL::to('admin/slide/create') }}" class="btn btn-primary">
				<i class="glyphicon glyphicon-pushpin"></i>
				Post New Slide
			</a>
		</div>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<td> # </td>
					<td> Item Name </td>
					<td> Link </td>
					<td> Action </td>
				</tr>
			</thead>

			<tbody>
				@foreach($items as $item)
					<tr>
						<td> {{ $item->id }} </td>
						<td> {{ $item->summary }} </td>
						<td>
							@if( $item->link )
								<a href="{{ $item->link }}">
									<i class="glyphicon glyphicon-share-alt"></i>
								</a>
							@endif
						</td>
						<td>
							<a href="{{ URL::to('admin/slide/' . $item->id . '/edit') }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>

							<a href="" class="delete" data-id="{{ $item->id }}">
								<i class="glyphicon glyphicon-remove"></i>
							</a>

							{{ Form::token() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{{ $items->links() }}
	@else
		<div class="alert alert-info">
			You have not yet posted a slide. Why don't we
			<a href="{{ URL::to('admin/slide/create') }}" class="alert-link">create one</a>?
		</div>
	@endif
@stop

@section('scripts')
	<script>
		(function($) {
			var dlt 	= $('.delete'),
				_token 	= $('[name=_token]'),
				prompt	= "Are you sure to delete this? This action cannot be undone";

			dlt.on('click', function(e) {
				e.preventDefault();
				
				var	response 	= confirm(prompt),
					self 		= $(this),
					url 		= '{{ url('admin/slide') }}/' + self.data('id'),
					data 		= {
						'_token': _token.val(),
					}

				if(response) {
					$.ajax({
						url: url,
						type: 'DELETE',
						data: data,
						success: function(response) {
							if(response.status)
								window.location.reload();
							else
								alert('An error has occured. Please refresh the page.');
						}
					})
				}
			});
		})(jQuery);
	</script>
@stop