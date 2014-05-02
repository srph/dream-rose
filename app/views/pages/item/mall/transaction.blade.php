@extends('templates.default')

@section('title')
	- Buy {{ $item->name }} with {{ strtoupper($payment) }}
@stop

@section('content')
	@if($status)
		<div class="alert alert-info">
			<p>
				Are you sure to buy <strong>{{ $item->name }}</strong> with your <em>{{ strtoupper($payment) }}</em>?
				<strong> <span id="trs" style="cursor: pointer;"> Click here to transact! </span> </strong>

				<div class="hide">
					{{ Form::open(array('id' => 'trs-frm', 'url' => "panel/mall/transaction/{$item->id}/$payment")) }}
					{{ Form::close() }}
				</div>
			</p>
		</div>
	@else
		<div class="alert alert-warning">
			Oops, this is an invalid transaction!
		</div>
	@endif
@stop

@section('scripts')
	<script>
		(function($) {
			$('#trs').on('click', function(e) {
				$('#trs-frm').submit();
			});
		})(jQuery);
	</script>
@stop