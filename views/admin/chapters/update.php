<h1>Edit Chapter</h1>
<form method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?php echo $chapter['id'] ?>" >
    <label>name: <input type="text" name="name" value="<?php echo $chapter['name'] ?? '' ?>"></label>
    </br>
    <label>index_chapter: <input type="text" name="index_chapter" value="<?php echo $chapter['index_chapter'] ?? '' ?>" ></label>
    <input type="submit">
</form>