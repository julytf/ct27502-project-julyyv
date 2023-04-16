<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Comic</h3>
            </div>
            <form method="post"  enctype="multipart/form-data" style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Cover Image</label>
                        <div class="input-group mb-3">
                            <input name="cover_image" type="file" class="form-control" accept="image/png, image/gif, image/jpeg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option value="Sắp phát hành">Sắp phát hành</option>
                            <option selected value="Đang cập nhật">Đang cập nhật</option>
                            <option value="Hoàn Thành">Hoàn Thành</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author">
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" name="publisher">
                    </div>
                    <div class="form-group">
                        <label>Genres</label>
                        <div class="row">

                            <?php foreach ($genres as $genre) : ?>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="genre[]" type="checkbox" value="<?php echo $genre['id'] ?>">
                                            <label class="form-check-label"><?php echo $genre['name'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

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