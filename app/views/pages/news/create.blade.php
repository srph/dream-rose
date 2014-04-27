@extends('templates.default')

@section('title') - Publish News @stop

@section('styles')
	<link rel="stylesheet" href="http://lab.lepture.com/editor/editor.css" />
@stop

@section('content')
	<h4> Publish News </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('id' => 'vote-form', 'files' => true, 'url' => 'admin/news', 'method' => 'POST')) }}

				<div class="form-group">
					<label> Title <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="title" value="{{ Input::old('title') }}">
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
						<option value="1" @if( Input::old('type') == 1 ) selected @endif> Article </option>
						<option value="2" @if( Input::old('type') == 2 ) selected @endif> Updates </option>
						<option value="3" @if( Input::old('type') == 3 ) selected @endif> Events </option>
					</select>

					@if( $errors->has('type') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('type') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Content <span class="off"> * </span> </label>
					<textarea class="form-control" name="content" rows="15">{{ Input::old('content') }}</textarea>
					@if( $errors->has('content') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('content') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> News Cover <span class="off"> * </span> </label>
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
						<i class="glyphicon glyphicon-pencil"></i>
						Publish Article
					</button>

					<button type="button" class="btn btn-warning pull-right">
						<i class="glyphicon glyphicon-remove"></i>
						Cancel
					</button>
				</div>

			{{ Form::close() }}

		</div>
	</div>
@stop