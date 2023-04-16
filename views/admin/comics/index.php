<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Comics</h3>
				<div class="card-tools d-flex justify-content-end" style="gap: 5px;">
					<form class="m-0">
						<div class="input-group input-group-sm">
							<input type="text" name="q" class="form-control" placeholder="Search" value="<?php echo $q; ?>">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
					<div class="input-group input-group-sm" style="width: initial;">
						<a href="/admin/comics/create" class="btn btn-primary">Create</a>
					</div>
				</div>
			</div>

			<div class="card-body table-responsive p-0">
				<table class="table table-head-fixed text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Description</th>
							<th>Cover Image</th>
							<th>Status</th>
							<th>Author</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($comics as $comic) : ?>
							<tr onclick="handleClick(<?php echo $comic->id ?>)">
								<td><?php echo $comic->id ?></td>
								<td class="text-wrap" style="max-width: 200px;"><?php echo truncate($comic->name, 160) ?></td>
								<td class="text-wrap" style="max-width: 200px;"><?php echo truncate($comic->description, 160) ?></td>
								<td><img src="/img/<?php echo $comic->cover_image ?>" style="max-width: 100px; max-width: 100px;" /></td>
								<td><?php echo $comic->status ?></td>
								<td><?php echo truncate($comic->author, 20) ?></td>
								<td>
									<a href="/admin/comics/<?php echo $comic->id ?>/edit" class="btn btn-primary btn-sm">Edit</a>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
					<tfoot class="card-footer clearfix">
						<tr>
							<td colspan="99">

								<?php require_once 'components/paginate.php'; ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>

		</div>

	</div>
</div>

<script>
	function handleClick(chapterId) {

		window.location.href = `/admin/comics/${chapterId}`
	}
</script>