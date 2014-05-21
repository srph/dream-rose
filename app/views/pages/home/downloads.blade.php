@extends('templates.default')

@section('title') - Downloads @stop

@section('content')
	<h1> Downloads </h1>
	<hr>

	<div class="alert alert-info">
		Please make sure that you meet our <a href="#systemreq" class="alert-link">system requirements</a> before downloading the game client. Follow our easy <a href="#" class="alert-link">Installation</a> guide if you need a little help!
	</div>
	
	<div class="form-group"  id="systemreq">
		<div class="text-center">
			<a href="{{ url( Config::get('dream.downloads.client.link') ) }}" class="btn btn-success btn-lg" style="width: 250px;">
				<div class="row" style="margin-top: 10px;">
					<div class="col-md-4">
						<h2 style="margin-top: 0;"> <i class="glyphicon glyphicon-download-alt"></i> </h2>
					</div>

					<div clas="col-md-8">
					<h5 style="margin-top: 0;">
						Download Client <br />
						{{ Config::get('dream.downloads.client.update') }}  <br />
						{{ Config::get('dream.downloads.client.size') }} <br />
					</h5>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="alert alert-warning">
		<strong>Note</strong>: the file system of the drive that you install the client to MUST be formatted as NTFS. If your file system is FAT32, you will receive errors when installing and/or updating the client.
	</div>

	<h4> System Requirements </h4>

	<div class="panel panel-default">

		<div clas="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<td> </td>
						<td> <strong> Minimum </strong> </td>
						<td> <strong> Recommended </strong> </thd>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td> CPU </td>
						<td> Intel Pentium 4 2.4GHz, or equivalent </td>
						<td> Intel Core i3 1.8GHz, or equivalent </td>
					</tr>

					<tr>
						<td> RAM </td>
						<td> 1GB </td>
						<td> 2GB </td>
					</tr>

					<tr>
						<td> Graphics Card</td>
						<td> Intel HD3000, or equivalent </td>
						<td> Intel HD4000, or equivalent </td>
					</tr>

					<tr>
						<td> Hard Drive </td>
						<td> 5GB NTFS </td>
						<td> 10GB NTFS </td>
					</tr>

					<tr>
						<td> Operating System </td>
						<td> Windows XP </td>
						<td> Windows XP / Vista / 7 / 8 </td>
					</tr>

					<tr>
						<td> DirectX </td>
						<td> DirectX 9.0 </td>
						<td> DirectX 9.0 </td>
					</tr>

					<tr>
						<td> Other </td>
						<td> Internet Explorer 9 </td>
						<td> Google Chrome 35 </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@stop