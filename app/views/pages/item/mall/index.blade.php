@extends('templates.default')

@section('title') - Item Mall @stop

@section('content')
	<h2> Item Mall </h2>
	<hr>

	@if( Session::has('item-transaction-error') )
		<div class="alert alert-danger">
			@if( !Session::get('item-transaction-error') == '')
				{{ Session::get('item-transaction-error') }}
			@else
				<p> An error had occured. </p>
			@endif
		</div>
	@endif

	@if( Session::has('item-transaction-success') )
		<div class="alert alert-success">
			<p> You have successfully purchased <strong>{{ Session::get('item-transaction-success') }}</strong>  </p>
		</div>
	@endif

	<ul class="nav nav-tabs" style="font-size: 10px;">
		@foreach($categories as $index => $category)
			<li @if($index == 0) class="active" @endif>
				<a href="#{{ $category->name }}" data-toggle="tab"> {{ ucfirst($category->name) }} </a>
			</li>
		@endforeach
	</ul>

	<div class="tab-content" style="margin-top: 24px;">
		@foreach($categories as $index => $category)
			<div class="tab-pane @if($index == 0) active @endif" id="{{ $category->name }}">
				<div class="row">
					@foreach($category->items as $item)
						@if( $category->items->count() )
							<div class="col-md-6">
								<div class="panel panel-default" style="height: 220px;">
									<div class="panel-body">
										<div class="clearfix">
											<div class="pull-left" style="margin-right: 5px;">
												<img src="{{ $item->getIconURL() }}">
											</div>

											<h4 style="margin-top: 1px;">
												{{ $item->name }}
											</h4>


										</div>
										<p style="height: 50px;">
											<small> {{ $item->description }} </small>
										</p>
										<hr>

										<div class="row">
											<div class="col-md-6">
												<button type="button" data-id="{{ $item->id }}" data-link="dp" class="btn btn-primary btn-block trs" @if($item->dp_price <= 0) disabled @endif>
													@if($item->dp_price <= 0)
														Unavailable
													@else
														Buy with DP ({{ $item->dp_price }} pts)
													@endif
												</button>
											</div>

											<div class="col-md-6">
												<button type="button" data-id="{{ $item->id }}" data-link="vp" class="btn btn-warning btn-block trs" @if($item->vp_price <= 0) disabled @endif>
													@if($item->vp_price <= 0)
														Unavailable
													@else
														Buy with VP ({{ $item->vp_price }} pts)
													@endif
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						@else
							<div class="alert alert-info">
								<p> No items are available for this section. Do come back again later! </p>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
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
			});
		})(jQuery);
	</script>
@stop