@extends('templates.default')

@section('title') - Post New Slide @stop

@section('content')
	<h4> Post New Slide </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('files' => true, 'url' => 'admin/slide', 'method' => 'POST')) }}

				<div class="form-group">
					<label> Slide Image <span class="off"> * </span> </label>
					<input type="file" name="image">

					<p class="help-block">
						Self-explanatory. Image to be used for the slide. Recommended size:
						{{ Config::get('dream.slides.sizes.width') }} x {{ Config::get('dream.slides.sizes.height') }}
					</p>

					@if( $errors->has('image') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('image') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Caption </label>
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