<div class="panel panel-default panel-lara">
	<div class="panel-heading">
		Vote 4 Us!
	</div>

	<div class="panel-body" style="padding: 0; padding-top: 10px;">
		@foreach($v4us as $link)
			<p class="text-center">
				<a href="{{ $link->link }}">
					<img src="{{ $link->getImageURL() }}">
				</a>
			</p>
		@endforeach
	</div>
</div>