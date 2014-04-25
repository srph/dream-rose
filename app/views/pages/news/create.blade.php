@extends('templates.default')

@section('title') - Write New Article @stop

@section('content')
	<h4> Write New Article </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('files' => true, 'url' => 'admin/slide', 'method' => 'POST')) }}

				<div class="form-group">
					<label> Article Cover <span class="off"> * </span> </label>
					<input type="file" name="cover">

					<p class="help-block">
						Self-explanatory. A cover image for the news. Recommended size:
						{{ Config::get('dream.news.sizes.width') }} x {{ Config::get('dream.news.sizes.height') }}
					</p>

					@if( $errors->has('image') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('cover') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Content </label>
					<textarea class="form-control" name="caption"> </textarea>
					<p class="help-block"> Max of 200 characters. Keep it concise! </p>
					@if( $errors->has('caption') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('caption') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Link </label>
					<input type="text" class="form-control" name="link">
					<p class="help-block"> URL which the slide may direct the user to when the slide is clicked. </p>
					@if( $errors->has('link') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('link') }} </p>
						</div>
					@endif
				</div>


				<div class="clearfix">
					<button type="submit" class="btn btn-success">
						<i class="glyphicon glyphicon-pushpin"></i>
						Post New Slide
					</button>

					<a href="{{ URL::to('admin/slide') }}" class="btn btn-warning pull-right">
						<i class="glyphicon glyphicon-remove"></i>
						Cancel
					</a>
				</div>

			{{ Form::close() }}

		</div>
	</div>
@stop