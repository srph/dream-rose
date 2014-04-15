<!DOCTYPE html>
<html lang="en">
<head>
	<title> Dream Rose @yield('title') </title>
	<meta charset="utf-8">
	{{ HTML::style('vendor/bootstrap-dist/css/bootstrap.min.css') }}
</head>

<body>
	<div class="container">
		@include('templates/modules.navigation')
	</div>

	{{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
	{{ HTML::script('vendor/bootstrap-dist/js/bootstrap.min.js') }}
</body>
</html>