<?php
$successes = flash_message()->get("success");
$errors = flash_message()->get("error");
?>

<?php if (!empty($successes)) : ?>

    <div class="row">
        <div class="col">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Successes</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        <?php foreach ($successes as $success) : ?>
                            <li>
                                <?php echo $success; ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>



<?php if (!empty($errors)) : ?>
    <div class="row">
        <div class="col">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Errors</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li>
                                <?php echo $error; ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>