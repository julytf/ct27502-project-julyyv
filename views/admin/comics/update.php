<h1>Update Comic</h1>
<form method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?php echo $comic['id'] ?>" >
    <label>name: <input type="text" name="name" 
    value="<?php echo $comic['name'] ?? '' ?>"></label>
    </br>
    <label>description: <input type="text" name="description" 
    value="<?php echo $comic['description'] ?? '' ?>"></label>
    </br>
    <label>cover_image: <input type="file" name="cover_image"></label>
    </br>
    <label for="status">status:</label>
    <select name="status" id="status">
        <option value="dang cap nhap" 
        <?php if($comic['status'] === 'dang cap nhap') echo "selected" ?> >Dang cap nhap</option>
        <option value="hoan thanh"
        <?php if($comic['status'] === 'hoan thanh') echo "selected" ?> >hoan thanh</option>
    </select>
    <br>
    Genre:
    <br>
    <?php foreach ($genres as $genre): ?>
        <?php echo $genre['name'] ?>
        <input type="checkbox" name="genre[]" value="<?php echo $genre['id'] ?>" 
        <?php echo findObjectById($genre['id'],$comic_genre_arr) !== false ? "checked" : "" ?>
        >
	<?php endforeach ?>
    </br>
    <label>author: <input type="text" name="author"
    value="<?php echo $comic['author'] ?? '' ?>"></label>
    </br>
    <input type="submit">
</form>