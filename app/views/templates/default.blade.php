<!DOCTYPE html>
<html lang="en">
<head>
	<title> {{ Config::get('dream.name') }} @yield('title') </title>
	<meta charset="utf-8">
	{{ HTML::style('vendor/bootstrap-dist/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
	{{ HTML::script('vendor/bootstrap-dist/js/bootstrap.min.js') }}
	@yield('styles')
</head>

<body>
	<div class="container">
		@include('templates/modules.navigation')

		{{-- Homepage Slideshow --}}
		@if(Request::is('/'))
			@include('templates/modules.slideshow') <br />
		@endif

		<div class="row">
			<div class="col-md-3">
				@include('templates/modules.side')
			</div>

			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-body">
						@yield('content')
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<p class="text-muted"> &copy; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget elit porttitor </p>
		</div>
	</div>

	{{ HTML::script('assets/scripts/main.js') }}
	@yield('scripts')
</body>
</html>