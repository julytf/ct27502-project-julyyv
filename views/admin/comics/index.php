<h1>Comic</h1>
<table border="1" width="100%">
	<tr>
        <th>id</th>
		<th>name</th>
		<th>description</th>
		<th>cover_image</th>
		<th>status</th>
		<th>author</th>
        <th>edit</th>
        <th>delete</th>
        <th>view comic</th>
	</tr>
	<?php foreach ($comics as $comic): ?>
		<tr>
            <td><?php echo $comic['id'] ?></td>
            <td><?php echo $comic['name'] ?></td>
            <td><?php echo $comic['description'] ?></td>
            <td><img height='100' src="/<?php echo $comic['cover_image'] ?>"></td>
            <td><?php echo $comic['status'] ?></td>
            <td><?php echo $comic['author'] ?></td>
			<td>
				<a href="/admin/comics/<?php echo $comic['id'] ?>/edit">
					Edit
				</a>
			</td>
			
			<td>
				<form method="POST" action="/admin/comics/<?php echo $comic['id'] ?>/delete">
					<input type="hidden" name="_method" value="DELETE">
					<button>DELETE</button>
				</form>
			</td>

			<td>
				<a href="/admin/comics/<?php echo $comic['id'] ?>/chapters">
					view
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php 
// print_r(json_encode($comics));