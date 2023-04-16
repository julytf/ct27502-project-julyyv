<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Comics</h3>
				<a href="/admin/genres/create" class="btn btn-primary btn-sm float-right">Create</a>
			</div>

			<div class="card-body table-responsive p-0">
				<table class="table table-head-fixed text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Description</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>


						<?php foreach ($genres as $genre) : ?>
							<tr onclick="handleClick(<?php echo $genre->id ?>)">
								<td><?php echo $genre['id'] ?></td>
								<td><?php echo $genre['name'] ?></td>
								<td><?php echo $genre['description'] ?></td>
								<td>
									<a class="btn btn-primary" href="/admin/genres/<?php echo $genre['id'] ?>/edit">
										Edit
									</a>
								</td>

								<td>
									<form method="POST" action="/admin/genres/<?php echo $genre['id'] ?>/delete">
										<input type="hidden" name="_method" value="DELETE">
										<button class="btn btn-danger">DELETE</button>
									</form>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
			</div>

		</div>

	</div>
</div>

<script>
	function handleClick(genreId) {

		window.location.href = `/admin/genres/${genreId}`
	}
</script>