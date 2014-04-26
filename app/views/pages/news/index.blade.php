@extends('templates.default')

@section('title') - Manage News @stop

@section('content')
	<h4> Manage News </h4>
	<hr>

	@if( Session::has('news-deleted-success') )
		<div class="alert alert-success">
			<p> The article was successfully deleted! </p>
		</div>
	@endif

	@if( Session::has('news-stored-success') )
		<div class="alert alert-success">
			<p> The article was successfully published! </p>
		</div>
	@endif

	<div class="form-group">
		<a href="{{ URL::to('admin/news/create') }}" class="btn btn-primary">
			<i class="glyphicon glyphicon-pencil"></i>
			Publish New Article
		</a>
	</div>

	@if( $news->count() )
		<table class="table table-hover">
			<thead>
				<tr>
					<td> # </td>
					<td> Title </td>
					<td> Type </td>
					<td> Date Published </td>
					<td> Published By </td>
					<td> Action </td>
				</tr>
			</thead>

			<tbody>
				@foreach($news as $article)
					<tr>
						<td> {{ $article->id }} </td>
						<td> {{ $article->title }} </td>
						<td> {{ $article->type->name }} </td>
						<td> {{ $article->datePublished }} </td>
						<td> {{ $article->user->username }} </td>
						<td>
							<a href="{{ URL::to('admin/news/' . $article->id . '/edit') }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>

							<a href="" class="delete" data-id="{{ $article->id }}">
								<i class="glyphicon glyphicon-remove"></i>
							</a>

							{{ Form::token() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{{ $news->links() }}
	@else
		<div class="alert alert-info">
			You have not yet published an article. Why don't we
			<a href="{{ URL::to('admin/news/create') }}" class="alert-link">create one</a>?
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
					url 		= '{{ url('admin/news') }}/' + self.data('id'),
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