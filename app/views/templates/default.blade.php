<!DOCTYPE html>
<html lang="en">
<head>
	<title> {{ Config::get('dream.name') }} @yield('title') </title>
	<meta charset="utf-8">
	{{ HTML::style('vendor/bootstrap-dist/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/dream.css') }}
	{{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
	{{ HTML::script('vendor/bootstrap-dist/js/bootstrap.min.js') }}
	@yield('styles')
</head>

<body>
	@include('templates/modules/scripts.facebook')
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
			@include('templates/modules.footer')
		</div>
	</div>

	<script type="text/javascript">
		var baseURL = "{{ url('login') }}",
			auth = '{{ Auth::check() }}';
	</script>
	{{ HTML::script('assets/scripts/main.js') }}
	@yield('scripts')
</body>
</html>