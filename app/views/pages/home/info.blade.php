@extends('templates.default')

@section('title') - Game Info @stop

@section('content')
	<h1> Game Info </h1>
	<hr>

	<p> <img src="{{ asset('assets/img/h5scbJDc.jpg') }}"> </p>

	<!-- Key Features -->
	<h4 class="text-center"> Key Features </h4>
	<ul class="game-info-custom">
		<div class="row">
			<div class="col-md-3">			
					<li> Dedicated Server 24/7 </li>
					<li> iROSE Based </li>
					<li> Buff Fairy </li>
					<li> 99.99% Stable Server </li>
			</div>

			<div class="col-md-3">
					<li> Exclusive Maps </li>
					<li> Vote Mall </li>
					<li> Exclusive Items </li>
					<li> Exclusive ingame quest</li>
			</div>

			<div class="col-md-3">
					<li> Daily Events </li>
					<li> Weekly Events </li>
					<li> Monthly Events </li>
					<li> Max Level: 255 </li>
			</div>

			<div class="col-md-3">
					<li> Max Stats: 400 </li>
					<li> No Reborn </li>
					<li> Balanced Classes </li>
			</div>
		</div>
	</ul>

	<hr>

	<!-- Server Rates -->
	<h4 class="text-center"> Server Rates </h4>
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-10">
			<div class="row">
				<div class="col-md-3"></div>

				<div class="col-md-6">
					<div class="panel panel-default">
						<table class="table text-center">
							<thead>
								<tr>
									<td> <strong> EXP </strong> </td>
									<td> <strong> Drop </strong> </td>
									<td> <strong> Zulie </strong> </td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td> {{ Config::get('dream.info.rates.exp') }}x </td>
									<td> {{ Config::get('dream.info.rates.drop') }}x </td>
									<td> {{ Config::get('dream.info.rates.zulie') }}x </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-md-3"></div>
			</div>
		</div>

		<div class="col-md-1"></div>
	</div>
@stop