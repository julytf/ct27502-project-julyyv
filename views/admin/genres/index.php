<h1>Genre</h1>
<table border="1" width="100%">
	<tr>
        <th>id</th>
		<th>name</th>
		<th>description</th>
        <th>edit</th>
        <th>delete</th>
	</tr>
	<?php foreach ($genres as $genre): ?>
		<tr>
            <td><?php echo $genre['id'] ?></td>
            <td><?php echo $genre['name'] ?></td>
            <td><?php echo $genre['description'] ?></td>
			<td>
				<a href="/admin/genres/<?php echo $genre['id'] ?>/edit">
					Edit
				</a>
			</td>
			
			<td>
				<form method="POST" action="/admin/genres/<?php echo $genre['id'] ?>/delete">
					<input type="hidden" name="_method" value="DELETE">
					<button>DELETE</button>
				</form>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php 
// print_r(json_encode($genres));