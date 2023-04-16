<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Chapter</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" style="margin-bottom: 0;">
                <input type="hidden" name="id" >
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="form-group">
                        <label>Index Chapter</label>
                        <input type="text" class="form-control" name="index_chapter" >
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <div class="input-group mb-3">
                            <input name="upload[]" type="file" multiple class="form-control" accept="image/png, image/gif, image/jpeg">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>