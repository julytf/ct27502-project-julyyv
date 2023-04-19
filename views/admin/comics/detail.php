<div class="row">
    <div class="col">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Detail Comic</h3>
                <a href="/admin/comics/<?php echo $comic->id ?>/edit" class="btn btn-primary btn-sm float-right">Edit</a>
                <form onsubmit="return confirmDeleteComic()" class="float-right" action="/admin/comics/<?php echo $comic->id; ?>/delete" method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger btn-sm mr-2">Delete</button>
                </form>
            </div>
            <div style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input readonly type="text" class="form-control" name="name" value="<?php echo $comic['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea readonly type="text" class="form-control" name="description"><?php echo $comic['description'] ?></textarea>
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
                                            <input onclick="return false;" class="form-check-input" name="genre[]" type="checkbox" value="<?php echo $genre['id'] ?>" <?php echo findObjectById($genre['id'], $comic_genre_arr) !== false ? "checked" : "" ?>>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chapters </h3>
                <a href="/admin/comics/<?php echo $comic->id ?>/chapters/create" class="btn btn-primary btn-sm float-right">Create</a>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>index_chapter</th>
                            <th>name</th>
                            <th>comic_id</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($chapters as $key => $chapter) : ?>
                            <tr onclick="handleClick(<?php echo $chapter['id'] ?>)" role="button">
                                <td><?php echo $chapter['id'] ?></td>
                                <td><?php echo $chapter['index_chapter'] ?></td>
                                <td><?php echo $chapter['name'] ?></td>
                                <td><?php echo $chapter['comic_id'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/admin/comics/<?php echo $comic->id ?>/chapters/<?php echo $chapter->id ?>/edit">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form onsubmit="return confirmDeleteChapter(<?php echo $chapter['id'] ?>,'<?php echo $chapter['name']; ?>')" method="POST" action="/admin/comics/<?php echo $comic->id ?>/chapters/<?php echo $chapter->id ?>/delete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
<script>
    function confirmDeleteComic() {
        return confirm(`Bạn có chắc là bạn muốn xóa "<?php echo $comic->name ?>"?`)
    }

    function confirmDeleteChapter(index, name) {
        return confirm(`Bạn có chắc là bạn muốn xóa chapter ${index}: "${name}"?`)
    }

    function handleClick(chapterId) {

        window.location.href = `/admin/comics/<?php echo $chapter['id'] ?>/chapters/${chapterId}`
    }
</script>