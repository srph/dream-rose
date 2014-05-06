<div class="thumbnail">
	@foreach($events as $index => $event)
		@if($index == 0)
			<img src="{{ $event->getImageURL() }}" width="387" height="162">
			<div class="caption">
				<h5> <strong> {{ $event->title }} </strong> </h5>
				<h5> <small> {{ Carbon\Carbon::createFromTimeStamp(strtotime($event->created_at))->diffForHumans() }} </small> </h5>

				<a href="{{ URL::to('news/' . $event->id) }}" class="btn btn-default">
					Read More
				</a>
			</div>
		@else
			<ul class="nav nav-pills nav-stacked">
				<li class="active" style="margin-bottom: 3px;">
					<a href="{{ URL::to('news/' . $event->id) }}"> {{ $event->title }} </a>
				</li>
			</ul>
		@endif
	@endforeach
</div>