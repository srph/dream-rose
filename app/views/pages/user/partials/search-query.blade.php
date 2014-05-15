{{ Form::open(array('method' => 'GET')) }}
	<div class="form-group">
		<label> Find by Username </label>

		<div class="input-group">

			<input type="text" class="form-control" name="query" value="{{ Input::get('query') }}">

			<div class="input-group-btn">
				<button type="submit" class="btn btn-default">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>

		</div>

	</div>
{{ Form::close() }}