@extends('templates.default')

@section('title') - Redirecting.... @stop

@section('content')
	@if($response)
		<div class="alert alert-info">
			<p>
			You are now being redirect to {{ $link->title }}. After voting, your vote points will automatically increase.
			If you have not been redirected, you may click <a href="{{ $link->link }}" class="alert-link">this link</a> to
			manually redirected
			</p>
		</div>
	@else
		<div class="alert alert-warning">
			<p>
			We do appreciate your support, but you have already voted us at this link today. Worry not, you may do so
			again in the next 12 hours.
			</p>
		</div>
	@endif
@stop

@section('scripts')
	<script>
		if( {{ $response }} ) {
			setInterval(function() {
				window.location.href = '{{ $link->link }}';
			}, 2000);
		}
	</script>
@stop