@extends('templates.default')

@section('title')
	- Item Mall: {{ ucfirst($category->name) }}
@stop

@section('content')
	<h4> Item Mall: {{ ucfirst($category->name) }} </h4>
	<hr>
	
	@include('pages/item/mall/partials.item')
@stop

@section('scripts')
	<script>
		(function($) {
			var trs = $('.trs');

			trs.on('click', function(e) {
				var self = $(this),
					link = self.data('link'),
					id = self.data('id'),
					url = '{{ url('panel/mall/transaction') }}/' +
						id + '/' + link;

				if ( ! self.is(':disabled') ) {
					window.location.href = url;
				}

				return false;
			});
		})(window.jQuery);
	</script>
@stop