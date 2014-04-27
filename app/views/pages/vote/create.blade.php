@extends('templates.default')

@section('title') - Create Link @stop

@section('content')
	<h4> Create Link </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('id' => 'vote-form', 'files' => true, 'url' => 'admin/vote-links', 'method' => 'POST')) }}

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
					<label> Link Image <span class="off"> * </span> </label>
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
					<input type="text" class="form-control" name="link" value="{{ Input::old('link') }}">
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
						Create Link
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