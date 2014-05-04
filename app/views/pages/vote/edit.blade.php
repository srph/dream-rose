@extends('templates.default')

@section('title') - Edit Link @stop

@section('content')
	<h4> Edit Link </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			@if(Session::has('vote-link-updated-success'))
				<div class="alert alert-success">
					The <strong>vote link</strong> was updated <strong>successfully</strong>!
				</div>
			@endif

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('id' => 'vote-form', 'files' => true, 'url' => 'admin/vote-links/' . $vote->id, 'method' => 'PUT')) }}

				<div class="form-group">
					<label> Title <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="title" value="{{ $vote->title }}">
					<p class="help-block"> Max of 48 words </p>
					@if( $errors->has('title') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('title') }} </p>
						</div>
					@endif
				</div>

				<div class="form-group">
					<label> Current Link Image </label>
					<p><img src="{{ $vote->getImageURL() }}"></p>
				</div>


				<div class="form-group">
					<label> Replace Link Image (optional) </label>
					<input type="file" name="image">

					<p class="help-block">
						Self-explanatory.
					</p>

					@if( $errors->has('image') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('image') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Link <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="link" value="{{ $vote->link }}">
					<p class="help-block"> Max of 48 words </p>
					@if( $errors->has('link') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('link') }} </p>
						</div>
					@endif
				</div>

				<div class="clearfix">
					<button type="submit" class="btn btn-success" id="vote-btn">
						<i class="glyphicon glyphicon-ok"></i>
						Edit Link
					</button>

					<a href="{{ URL::to('admin/vote-links') }}" class="btn btn-warning pull-right">
						<i class="glyphicon glyphicon-remove"></i>
						Cancel
					</a>
				</div>

			{{ Form::close() }}

		</div>
	</div>
@stop