<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Comics</h3>
				<!-- <div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-default">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div> -->
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

						
	<?php foreach ($genres as $genre): ?>
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
					<button class="btn btn-danger" >DELETE</button>
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