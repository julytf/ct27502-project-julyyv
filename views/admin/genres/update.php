<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Update Genre</h3>
                <a href="/admin/genres/<?php echo $genre->id ?>" class="btn btn-primary btn-sm float-right">Detail</a>
            </div>
            <form method="post" style="margin-bottom: 0;">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?php echo $genre['id'] ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $genre['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description"><?php echo $genre['description'] ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>