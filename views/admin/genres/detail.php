<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Detail Genre</h3>
                <a href="/admin/genres/<?php echo $genre->id ?>/edit" class="btn btn-primary btn-sm float-right">Edit</a>
            </div>
            <form style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input readonly type="text" class="form-control" name="name" value="<?php echo $genre['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea readonly type="text" class="form-control" name="description"><?php echo $genre['description'] ?></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>