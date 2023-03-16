<?php 
$successes = flash_message()->get("success"); 
$errors = flash_message()->get("error"); 
?>
<header>
    <h1>HEADER</h1>
</header>
<nav>
    
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
            <?php echo error; ?>
        </li>
    <?php endforeach ?>
</ul>