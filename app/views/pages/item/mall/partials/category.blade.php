@if( $categories->count() )

	<div class="row">
		@foreach($categories as $category)
			<div class="col-md-6">
				<div class="panel panel-default" style="height: 150px;">
					<div class="panel-body">

						<h2 class="text-center">
							<a href="{{ URL::to('panel/mall/category/' . $category->id) }}" class="item-mall-head">
								{{ ucfirst($category->name) }}
							</a>
						</h2>

					</div>
				</div>
			</div>
		@endforeach
	</div>

@else
	@include('pages/item/mall/partials/alerts.category-unavailable')
@endif