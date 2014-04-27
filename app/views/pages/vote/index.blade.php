@extends('templates.default')

@section('title') - Vote 4 Points @stop

@section('content')
	<h1> Vote 4 Points </h1>
	<hr>

	@if( Session::has('vote-link-deleted-success') )
		<div class="alert alert-success">
			<p> The article was successfully deleted! </p>
		</div>
	@endif

	@if( Session::has('vote-link-stored-success') )
		<div class="alert alert-success">
			<p> The article was successfully published! </p>
		</div>
	@endif

	@if( $links->count() )
		<div class="form-group">
			<a href="{{ URL::to('admin/news/create') }}" class="btn btn-primary">
				<i class="glyphicon glyphicon-star"></i>
				Create New Link
			</a>
		</div>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<td> # </td>
					<td> Title </td>
					<td> Link </td>
					<td> Actions </td>
				</tr>
			</thead>

			<tbody>
				@foreach($links as $link)
					<tr>
						<td> {{ $link->id }} </td>
						<td> {{ $link->title }} </td>
						<td>
							<a href="{{ $link->link }}">
								<i class="glyphicon glyphicon-share-alt"></i>
							</a>
						</td>
						<td>
							<a href="{{ URL::to('admin/vote-links/' . $link->id . '/edit') }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>

							<a href="" class="delete" data-id="{{ $link->id }}">
								<i class="glyphicon glyphicon-remove"></i>
							</a>

							{{ Form::token() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{{ $links->links() }}
	@else
		<div class="alert alert-info">
			You have not yet created a vote link. Why don't we
			<a href="{{ URL::to('admin/vote-links/create') }}" class="alert-link">create one</a>?
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
					url 		= '{{ url('admin/vote-links') }}/' + self.data('id'),
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