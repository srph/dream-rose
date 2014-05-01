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
		<div class="clearfix">
			<div class="pull-right">
				<div style="width: 300px;">
					<select class="form-control" name="category">
						<option value=""> Select Category </option>
						@foreach($categories as $category)
							<option value="{{ $category->name }}"> {{ ucfirst($category->name) }} </option>
						@endforeach
						</select>
				</div>
			</div>

			<div class="form-group">
				<a href="{{ URL::to('admin/item/create') }}" class="btn btn-primary">
					<i class="glyphicon glyphicon-pushpin"></i>
					Post New Item
				</a>
			</div>
		</div>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<td> # </td>
					<td> Item Name </td>
					<td> Action </td>
				</tr>
			</thead>

			<tbody>
				@foreach($items as $item)
					<tr>
						<td> {{ $item->id }} </td>
						<td> {{ $item->name }} </td>
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

		{{ $items->links('pages/item/partials.pagination') }}
	@else
		<div class="clearfix">
			<div class="pull-right">
				<div style="width: 300px;">
					<select class="form-control" name="category">
						<option value=""> Select Category </option>
						@foreach($categories as $category)
							<option value="{{ $category->name }}"> {{ ucfirst($category->name) }} </option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<p> </p>

		<div class="alert alert-info">
			@if( ! Input::has('category') )
				You have not yet posted an item. Why don't we
				<a href="{{ URL::to('admin/item/create') }}" class="alert-link">create one</a>?
			@else
				You have not yet posted an item for the {{ Input::get('category') }} category. Why don't we
				<a href="{{ URL::to('admin/item/create') }}" class="alert-link">create one</a>?
			@endif
		</div>
	@endif
@stop

@section('scripts')
	<script>
		(function($) {
			var dlt 	= $('.delete'),
				cat 	= $('select[name=category]'),
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

			@if( Input::has('category') )
				cat.val('{{ Input::get('category') }}')
			@endif

			cat.on('change', function() {
				var id = $(this).val();
				var url = '{{ url('admin/item') }}?category=' + id;

				window.location.href = (url);
			});
		})(jQuery);
	</script>
@stop