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
    <label>image: <input type="file" name="image"></label>
    </br>
    <label>cover_image: <input type="file" name="cover_image"></label>
    </br>
    <label>status : 
        <input type="radio" name="status" value="1"
        <?php if($comic['status'] == 1) echo "checked" ?> >complete
        <input type="radio" name="status" value="0"
        <?php if($comic['status'] == 0) echo "checked" ?> >not complete
    </label>
    </br>
    <label>others_name: <input type="text" name="others_name"
    value="<?php echo $comic['others_name'] ?? '' ?>"></label>
    </br>
    <label>country: <input type="text" name="country"
    value="<?php echo $comic['country'] ?? '' ?>"></label>
    </br>
    <label>release_date: <input type="date" name="release_date"
    value="<?php echo $comic['release_date'] ?? '' ?>"></label>
    </br>
    <input type="submit">
</form>