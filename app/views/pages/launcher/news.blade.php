<!DOCTYPE html>
<html lang="en">
	<head>
		{{ HTML::style('vendor/bootstrap-dist/css/bootstrap.min.css') }}
		<style>
			.container {
				width: 100%;
			}

			tr {
				cursor: pointer;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<td> # </td>
						<td> Title </td>
						<td> Type </td>
						<td> Date </td>
					</tr>
				</thead>

				<tbody>
					@foreach($news as $article)
						<tr onclick="window.open('{{ URL::to('news/' . $article->id) }}')">
							<td> {{ $article->id }} </td>
							<td> {{ $article->title }} </td>
							<td> {{ $article->type->name }} </td>
							<td> {{ $article->created_at->diffForHumans() }} </td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="form-group"> {{ $news->links() }} </div>
		</div>
	</body>
</html>