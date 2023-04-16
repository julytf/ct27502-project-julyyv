<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Update Comic</h3>
                <a href="/admin/comics/<?php echo $comic->id ?>" class="btn btn-primary btn-sm float-right">Detail</a>
            </div>
            <form method="post" style="margin-bottom: 0;">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?php echo $comic['id'] ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $comic['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description"><?php echo $comic['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cover Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg">
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
                        <input type="text" class="form-control" name="author" value="<?php echo $comic['author'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" name="publisher" value="<?php echo $comic['publisher'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Genres</label>
                        <div class="row">

                            <?php foreach ($genres as $genre) : ?>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="genre[]" type="checkbox" value="<?php echo $genre['id'] ?>" <?php echo findObjectById($genre['id'], $comic_genre_arr) !== false ? "checked" : "" ?>>
                                            <label class="form-check-label"><?php echo $genre['name'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

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