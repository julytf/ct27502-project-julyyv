<?php
    if(flash_message()->get("error")){
        $error = $_SESSION["flash_message"]["error"];
    }
?>
<h1>LOGIN</h1>
<form method="POST">
    <label>username: <input type="text" name="username"></label>
    </br>
    <label>password: <input type="password" name="password"></label>
    </br>
    <input type="submit">
</form>