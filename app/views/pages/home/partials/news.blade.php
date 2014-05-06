<div class="row">
	@foreach($news as $article)
		<div class="col-md-4">
			<div class="thumbnail" style="height: 330px;">
				<img src="{{ $article->getImageURL() }}" width="238" height="162">

				<div class="caption" style="oheight: 240px; overflow: hidden;">
					<h5> <strong> {{ $article->title }} </strong> </h5>
					<h5> <small> {{ Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }} </small> </h5>

					<a href="{{ URL::to('news/' . $article->id) }}" class="btn btn-default">
						Read More
					</a>
				</div>
			</div>
		</div>
	@endforeach
</div>