<div class="thumbnail">
	@foreach($updates as $index => $update)
		@if($index == 0)
			<img src="{{ $update->getImageURL() }}" width="387" height="162">

			<div class="caption">
				<h5> <strong> {{ $update->title }} </strong> </h5>
				<p> {{ $update->summary }} </p>

				<a href="{{ URL::to('news/' . $update->id) }}" class="btn btn-default">
					Read More
				</a>
			</div>

		@else
			<ul class="nav nav-pills nav-stacked">
				<li class="active" style="margin-bottom: 3px;">
					<a href="{{ URL::to('news/' . $update->id) }}"> {{ $update->title }} </a>
				</li>
			</ul>
		@endif
	@endforeach
</div>