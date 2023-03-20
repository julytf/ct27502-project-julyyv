<?php 
$successes = flash_message()->get("success"); 
$errors = flash_message()->get("error"); 
?>
<header>
    <h1>HEADER</h1>
</header>
<nav>
    <a href="/admin">/admin</a>
    <a href="/admin/logout">/admin/logout</a>
    <a href="/admin/comics">/admin/comics</a>
    <a href="/admin/comics/create">/admin/comics/create</a>
</nav>
<ul class="success">
    <?php foreach ($successes as $success): ?>
        <li>
            <?php echo $success; ?>
        </li>
    <?php endforeach ?>
</ul>
<ul class="error">
    <?php foreach ($errors as $error): ?>
        <li>
            <?php echo $error; ?>
        </li>
    <?php endforeach ?>
</ul>