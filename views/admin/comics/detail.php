<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Detail Comic</h3>
                <a href="/admin/comics/<?php echo $comic->id ?>/edit" class="btn btn-primary btn-sm float-right" >Edit</a>
            </div>
            <div style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input readonly type="text" class="form-control" name="name" value="<?php echo $comic['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input readonly type="text" class="form-control" name="description" value="<?php echo $comic['description'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Cover Image</label>
                        <div class="input-group mb-3">
                            <input readonly type="file" class="form-control" accept="image/png, image/gif, image/jpeg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select readonly class="form-control">
                            <option value="Sắp phát hành">Sắp phát hành</option>
                            <option selected value="Đang cập nhật">Đang cập nhật</option>
                            <option value="Hoàn Thành">Hoàn Thành</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input readonly type="text" class="form-control" name="author" value="<?php echo $comic['author'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <input readonly type="text" class="form-control" name="publisher" value="<?php echo $comic['publisher'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Genres</label>
                        <div class="row">

                            <?php foreach ($genres as $genre) : ?>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input  onclick="return false;" class="form-check-input" name="genre[]" type="checkbox" value="<?php echo $genre['id'] ?>" <?php echo findObjectById($genre['id'], $comic_genre_arr) !== false ? "checked" : "" ?>>
                                            <label class="form-check-label"><?php echo $genre['name'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>