@extends('templates.default')

@section('title')
	- Edit News ({{ $news->title }})
@stop

@section('content')
	<h4> Edit News ({{ $news->title }}) </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			@if( Session::has('news-updated-success') )
				<div class="alert alert-success">
					<p> The <strong>news</strong> has been updated <strong>successfully</strong>!</p>
				</div>
			@endif

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('id' => 'vote-form', 'files' => true, 'url' => 'admin/news/' . $news->id, 'method' => 'PUT')) }}

				<div class="form-group">
					<label> Title <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="title" value="{{ $news->title }}">
					<p class="help-block"> Max of 48 words </p>
					@if( $errors->has('title') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('title') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Post Type <span class="off"> * </span> </label>
					<select name="type" class="form-control">
						<option value="1" @if( $news->type_id == 1 ) selected @endif> Article </option>
						<option value="2" @if( $news->type_id == 2 ) selected @endif> Updates </option>
						<option value="3" @if( $news->type_id == 3 ) selected @endif> Events </option>
					</select>

					@if( $errors->has('type') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('type') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Content <span class="off"> * </span> </label>
					<textarea class="form-control" name="content" rows="15">{{ $news->content }}</textarea>
					@if( $errors->has('content') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('content') }} </p>
						</div>
					@endif
				</div>

				<div class="form-group">
					<label> Current Cover </label>
					<p> <img src="{{ $news->getImageURL() }}"> </p>
				</div>


				<div class="form-group">
					<label> Replace Current Cover (optional) </label>
					<input type="file" name="cover">

					<p class="help-block">
						Self-explanatory. A cover image for the news. Recommended size:
						{{ Config::get('dream.news.sizes.width') }} x {{ Config::get('dream.news.sizes.height') }}
					</p>

					@if( $errors->has('cover') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('cover') }} </p>
						</div>
					@endif
				</div>

				<div class="clearfix">
					<button type="submit" class="btn btn-success" id="vote-btn">
						<i class="glyphicon glyphicon-ok"></i>
						Edit News
					</button>

					<a href="{{ URL::to('admin/news') }}" class="btn btn-warning pull-right">
						<i class="glyphicon glyphicon-remove"></i>
						Cancel
					</a>
				</div>

			{{ Form::close() }}

		</div>
	</div>
@stop