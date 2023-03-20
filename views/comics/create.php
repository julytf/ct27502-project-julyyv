<h1>Create Comic</h1>
<form method="POST" enctype="multipart/form-data" >
    <label>name: <input type="text" name="name"></label>
    </br>
    <label>description: <input type="text" name="description"></label>
    </br>
    <label>image: <input type="file" name="image"></label>
    </br>
    <label>cover_image: <input type="file" name="cover_image"></label>
    </br>
    <label>status : 
        <input type="radio" name="status" value="1">complete
        <input type="radio" name="status" value="0">not complete
    </label>
    </br>
    <label>others_name: <input type="text" name="others_name"></label>
    </br>
    <label>country: <input type="text" name="country"></label>
    </br>
    <label>release_date: <input type="date" name="release_date"></label>
    </br>
    <input type="submit">
</form>