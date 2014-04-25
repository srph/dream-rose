@extends('templates.default')

@section('title') - Manage Slides @stop

@section('content')
	<h4> Manage Slides </h4>
	<hr>

	@if( Session::has('slide-deleted-success') )
		<div class="alert alert-success">
			<p> The <strong>slide</strong> has been successfully <strong>deleted</strong>! </p>
		</div>
	@endif

	@if( Session::has('slide-stored-success') )
		<div class="alert alert-success">
			<p> The <strong>slide</strong> has been successfully <strong>posted</strong>! </p>
		</div>
	@endif

	<div class="form-group">
		<a href="{{ URL::to('admin/slide/create') }}" class="btn btn-primary">
			<i class="glyphicon glyphicon-pushpin"></i>
			Post New Slide
		</a>
	</div>

	@if( $slides->count() )
		<table class="table table-hover">
			<thead>
				<tr>
					<td> # </td>
					<td> Caption </td>
					<td> Link </td>
					<td> Posted By </td>
					<td> Action </td>
				</tr>
			</thead>

			<tbody>
				@foreach($slides as $slide)
					<tr>
						<td> {{ $slide->id }} </td>
						<td> {{ $slide->summary }} </td>
						<td>
							@if( $slide->link )
								<a href="{{ $slide->link }}">
									<i class="glyphicon glyphicon-share-alt"></i>
								</a>
							@endif
						</td>
						<td> {{ $slide->user->username }} </td>
						<td>
							<a href="{{ URL::to('admin/slide/' . $slide->id . '/edit') }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>

							<a href="" class="delete" data-id="{{ $slide->id }}">
								<i class="glyphicon glyphicon-remove"></i>
							</a>

							{{ Form::token() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{{ $slides->links() }}
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
				console.log('Clicked');
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