@extends('templates.default')

@section('title') - Redirecting.... @stop

@section('content')
	@if($response)
		<div class="alert alert-info">
			<p>
				You are now being redirect to {{ $link->title }}. After voting, your vote points will automatically increase.
				You may vote again in the next {{ $interval }}. If you have not been redirected, you may click
				<a href="{{ $link->link }}" class="alert-link">this link</a> to be manually redirected.
			</p>
		</div>
	@else
		<div class="alert alert-warning">
			<p>
				We do appreciate your support, but you have already voted us at this link today. Worry not, you may do so
				again in the next {{ $interval }} hours. If you have not been redirected to the home page,
				you may click <a href="{{ URL::to('panel/vote') }}" class="alert-link">this link</a> to be manually redirected.
			</p>
		</div>
	@endif
@stop

@section('scripts')
	<script>
		var link = ('{{ $response }}')
			? '{{ $link->link }}'
			: "{{ URL::to('panel/vote') }}";

		setInterval(function() {
			window.location.href = link;
		}, 2000);
	</script>
@stop