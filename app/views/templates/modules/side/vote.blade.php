<div class="panel panel-default">
	<div class="panel-heading">
		Vote 4 Us!
	</div>

	<div class="panel-body" style="padding: 0; padding-top: 10px;">
		@foreach($v4us as $link)
			<p class="text-center">
				<img src="{{ $link->getImageURL() }}">
			</p>
		@endforeach
	</div>
</div>