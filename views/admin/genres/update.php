<h1>Update Genre</h1>
<form method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?php echo $comic['id'] ?>" >
    <label>name: <input type="text" name="name" 
    value="<?php echo $genre['name'] ?? '' ?>"></label>
    </br>
    description:
    <br>
    <textarea name="description" rows="4" cols="50"><?php echo $genre['description'] ?? '' ?></textarea>
    <br>
    <input type="submit">
</form>