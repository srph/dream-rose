@extends('templates.default')

@section('title') - Donation 4 Points @stop

@section('content')
	<p>
		We give great thanks for giving interest in supporting our server. In exchange of donating funds to keep the server running, we will reward your account with corresponding donation points. This may be used to buy items from the mall to boost your experience and character stats.
	</p>

	<p> We hope you enjoy, thank you. </p>

	<div class="alert alert-info">
		<p> 
			You will automatically receive points after a few minutes. If not, do contact us in the 
			<a href="{{ URL::to('forums') }}" class="alert-link">forums</a>. 
		</p>
	</div>
@stop