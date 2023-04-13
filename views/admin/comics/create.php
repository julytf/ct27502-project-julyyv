<h1>Create Comic</h1>
<form method="POST" enctype="multipart/form-data" >
    <label>name: <input type="text" name="name"></label>
    </br>
    <label>description: <input type="text" name="description"></label>
    </br>
    <label>cover_image: <input type="file" name="cover_image"></label>
    </br>
    <label for="status">status:</label>
    <select name="status" id="status">
        <option value="dang cap nhap">Dang cap nhap</option>
        <option value="hoan thanh">hoan thanh</option>
    </select>
    <br>
    Genre:
    <br>
    <?php foreach ($genres as $genre): ?>
        <?php echo $genre['name'] ?>
        <input type="checkbox" name="genre[]" value="<?php echo $genre['id'] ?>" >
	<?php endforeach ?>
    </br>
    <label>author: <input type="text" name="author"></label>
    </br>
    <input type="submit">
</form>