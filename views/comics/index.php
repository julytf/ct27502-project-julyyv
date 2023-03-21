<h1>Comic</h1>
<table border="1" width="100%">
	<tr>
        <th>id</th>
		<th>name</th>
		<th>description</th>
		<th>image</th>
		<th>cover_image</th>
		<th>status</th>
		<th>others_name</th>
        <th>country</th>
        <th>release_date</th>
        <th>edit</th>
        <th>delete</th>
	</tr>
	<?php foreach ($comics as $key => $comic): ?>
		<tr>
            <td><?php echo $comic['id'] ?></td>
            <td><?php echo $comic['name'] ?></td>
            <td><?php echo $comic['description'] ?></td>
			<td><img height='100' src="../../public/ <?php echo $comic['image'] ?>"></td>
            <td><img height='100' src="../../public/ <?php echo $comic['cover_image'] ?>"></td>
            <td><?php echo $comic['status'] ?></td>
            <td><?php echo $comic['others_name'] ?></td>
            <td><?php echo $comic['country'] ?></td>
            <td><?php echo $comic['release_date'] ?></td>
			<td>
				<a href="/admin/comics/<?php echo $comic['id'] ?>/edit">
					Edit
				</a>
			</td>
			
			<td>
				<a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">
					Delete
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php 
// print_r(json_encode($comics));