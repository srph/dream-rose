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
					<input type="text" class="form-control" name="name" value="{{ Input::old('name') }}">
					<p> </p>
					@if( $errors->has('name') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('name') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Category <span class="off"> * </span> </label>
					<select name="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}"> {{ ucfirst($category->name) }} </option>
						@endforeach
					</select>

					@if( $errors->has('category') )
						<div class="alert alert-danger">
							<p> {{ $errors->first('category') }} </p>
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Vote Point Price <span class="off"> * </span> </label>
							<input type="text" name="vp_price" class="form-control" value="{{ Input::old('vp_price') }}">
							<p class="help-block"> Value will become 0 when left blank. </p>
							@if( $errors->has('vp_price') )
								<p> </p>
								<div class="alert alert-danger">
									<p> {{ $errors->first('vp_price') }} </p>
								</div>
							@endif
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label> Donation Point Price <span class="off"> * </span> </label>
							<input type="text" name="dp_price" class="form-control" value="{{ Input::old('dp_price') }}">
							<p class="help-block"> Value will become 0 when left blank. </p>
							@if( $errors->has('dp_price') )
								<p> </p>
								<div class="alert alert-danger">
									<p> {{ $errors->first('dp_price') }} </p>
								</div>
							@endif
						</div>
					</div>
				</div>


				<div class="form-group">
					<label> Hexa Value <span class="off"> * </span> </label>
					<input type="text" name="hexa" class="form-control" value="{{ Input::old('hexa') }}">
					<p class="help-block"> Hexadecimal value of the item. </p>
					@if( $errors->has('hexa') )
						<p> </p>
						<div class="alert alert-danger">
							<p> {{ $errors->first('hexa') }} </p>
						</div>
					@endif
				</div>


				<div class="form-group">
					<label> Description <span class="off"> * </span> </label>
					<textarea class="form-control" name="description" rows="5">{{ Input::old('description') }}</textarea>
				</div>


				<div class="form-group">
					<label> Icon <span class="off"> * </span> </label>
					<input type="file" name="icon">

					<p class="help-block">
						Self-explanatory.
					</p>

					@if( $errors->has('icon') )
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