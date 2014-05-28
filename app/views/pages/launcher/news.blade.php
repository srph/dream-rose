<!DOCTYPE html>
<html lang="en">
	<head>
	</head>

	<body>
		<div class="container">
			<div class="table table-hover">
				<thead>
					<tr>
						<td> # </td>
						<td> Title </td>
						<td> Date </td>
					</tr>
				</thead>

				<tbody>
					@foreach($news as $article)
						<tr>
							<td> {{ $article->id }} </td>
							<td> {{ $article->title }} </td>
							<td> {{ $article->created_at->diffForHumans }} </td>
						</tr>
					@endforeach
				</tbody>
			</div>
		</div>
	</body>
</html>