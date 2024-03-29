<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Chapter</h3>
                <a href="/admin/comics/<?php echo $comic->id ?>/chapters/<?php echo $chapter->id ?>" class="btn btn-primary btn-sm float-right">Detail</a>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin-bottom: 0;">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?php echo $chapter['id'] ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $chapter['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Index Chapter</label>
                        <input type="text" class="form-control" name="index_chapter" value="<?php echo $chapter['index_chapter'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <div class="input-group mb-3">
                            <input name="upload[]" type="file" multiple class="form-control" accept="image/png, image/gif, image/jpeg">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Preview</h3>
            </div>
            <div class="card-body">
                <?php foreach($images as $image): ?>
                    <img class="mw-100" src="/img/<?php echo $image->file ?>"/>        
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>