@extends('templates.default')

@section('title') - Post New Item @stop

@section('content')
	<h4> Post New Item </h4>
	<hr>

	<div class="row">
		<div class="col-md-8">

			<div class="alert alert-warning">
				<p> Fields with the red asterisk (<span class="off">*</span>) are required </p>
			</div>

			{{ Form::open(array('id' => 'vote-form', 'files' => true, 'url' => 'admin/item', 'method' => 'POST')) }}

				<div class="form-group">
					<label> Name <span class="off"> * </span> </label>
					<input type="text" class="form-control" name="title" value="{{ Input::old('title') }}">
					@if( $errors->has('title') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('title') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Category <span class="off"> * </span> </label>
					<select name="type" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}"> {{ $category->name }} </option>
						@endforeach
					</select>

					@if( $errors->has('type') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('type') }} </p>
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Vote Point Price <span class="off"> * </span> </label>
							<input type="text" name="vp" class="form-control">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label> Donation Point Price <span class="off"> * </span> </label>
							<input type="text" name="dp" class="form-control">
						</div>
					</div>
				</div>


				<div class="form-group">
					<label> Hexa Value <span class="off"> * </span> </label>
					<input type="text" name="hexa" class="form-control">
					<p class="help-block"> Hexadecimal value of the item. </p>
				</div>


				<div class="form-group">
					<label> Description <span class="off"> * </span> </label>
					<textarea class="form-control" name="content" rows="5">{{ Input::old('content') }}</textarea>
					@if( $errors->has('content') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('content') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Icon <span class="off"> * </span> </label>
					<input type="file" name="cover">

					<p class="help-block">
						Self-explanatory.
					</p>

					@if( $errors->has('cover') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('icon') }} </p>
						</div>
					@endif
				</div>

				<div class="clearfix">
					<button type="submit" class="btn btn-success" id="vote-btn">
						<i class="glyphicon glyphicon-pencil"></i>
						Publish News
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