<?php
    if(flash_message()->get("success")){
        $success = $_SESSION["flash_message"]["success"];
        echo flash_message()->alert($success);
        flash_message()->clear("success");
    }
?>
<h1>ADMIN</h1>