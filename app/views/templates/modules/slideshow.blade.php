@if( $slides->count() )
	<div id="slideshow" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			@foreach($slides as $i => $slide)
				<li data-target="#slideshow" data-slide-to="{{ $i }}" @if($i === 0) class="active" @endif></li>
			@endforeach
		</ol>
	
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			@foreach($slides as $i => $slide)
			<div class="item @if($i == 0) active @endif">
				@if($slide->link) <a href="{{{ $slide->link }}}"> @endif
				<img src="{{ $slide->getImageURL() }}" width="1150" height="180">
				@if($slide->link) </a> @endif
	
	
				@if($slide->caption)
					<div class="carousel-caption">
						{{{ $slide->caption }}}
					</div>
				@endif
			</div>
			@endforeach
		</div>
	
		<!-- Controls -->
		<a class="left carousel-control" href="#slideshow" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#slideshow" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
@endif