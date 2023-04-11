<h1>Chapter</h1>
<a href="/admin/comics/<?php echo $comic_id ?>/chapters/create">create</a>
<table border="1" width="100%">
	<tr>
        <th>id</th>
		<th>index_chapter</th>
		<th>name</th>
		<th>comic_id</th>
		<th>edit</th>
		<th>delete</th>
	</tr>
	<?php foreach ($chapters as $key => $chapter): ?>
		<tr>
            <td><?php echo $chapter['id'] ?></td>
            <td><?php echo $chapter['index_chapter'] ?></td>
            <td><?php echo $chapter['name'] ?></td>
            <td><?php echo $chapter['comic_id'] ?></td>
			<td>
				<a href="/admin/comics/<?php echo $comic_id ?>/chapters/<?php echo $chapter['id'] ?>/edit">
					Edit
				</a>
			</td>
			<td>
				<form method="POST" action="/admin/comics/<?php echo $chapter['id'] ?>/delete">
					<input type="hidden" name="_method" value="DELETE">
					<button>DELETE</button>
				</form>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php 
// print_r(json_encode($comics));