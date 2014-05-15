@if( $items->count() )
	<div class="row">
		@foreach($items as $item)
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
						<h5 style="height: 50px; margin-top: 5px;">
							<small> {{ $item->description }} </small>
						</h5>
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
						</div> <!-- /.row | buttons -->

					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="clearfix">
		<div class="pull-right">
			<a href="{{ URL::to('panel/mall') }}" class="btn btn-default">
				<i class="glyphicon glyphicon-share-alt"></i>
				Go back to full list
			</a>
		</div>

		{{ $items->links() }}
	</div>
@else
	@include('pages/item/mall/partials/alerts.item-unavailable')
@endif