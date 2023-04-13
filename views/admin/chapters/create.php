<h1>Create Chapter</h1>
<form method="POST" enctype="multipart/form-data" >
    <label>name: <input type="text" name="name"></label>
    </br>
    <label>index_chapter: <input type="text" name="index_chapter"></label>
    </br>
    <input type="hidden" name="comic_id" value="<?php echo $comic_id ?>" >
    <br>
    <label>images:<input type="file" name="upload[]" multiple></label>
    <br>
    <input type="submit">
</form>