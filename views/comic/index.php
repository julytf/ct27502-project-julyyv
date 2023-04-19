<div class="main_content">
    <div class="book_detail">
        <ol class="breadcrumb">
            <li>
                <a href="/" itemprop="item">
                    <span itemprop="name">Trang Chủ</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li>
                <a itemprop="item>
                            <span itemprop=" name"><?php echo $comic->name ?></span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
        <div class="book_info">
            <div class="book_avatar"><img itemprop="image" alt="<?php echo $comic->name ?>" src="/img/<?php echo $comic->cover_image ?>"></div>
            <div class="book_other">
                <h1 itemprop="name"><?php echo $comic->name ?></h1>
                <div class="txt">
                    <ul class="list-info">
                        <li class="author row">
                            <p class="name col-xs-3">
                                <!-- TODO: -->
                                <i class="fa fa-user"></i> Tác giả
                            </p>
                            <p class="col-xs-9"><?php echo $comic->author ?></p>
                        </li>
                        <li class="status row">
                            <p class="name col-xs-3">
                                <i class="fa fa-rss"></i> Tình trạng
                            </p>
                            <!-- TODO: -->
                            <p class="col-xs-9"><?php echo $comic->status ?></p>
                        </li>
                    </ul>
                </div>
                <!-- TODO: -->
                <ul class="list01">
                    <?php foreach ($genres as $genre) : ?>
                        <li class="li03"><a><?php echo $genre->name ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="clear"></div>
                <ul class="story-detail-menu">
                    <li class="li01"><a href="/<?php echo $comic->id ?>/<?php echo $chapters[0]->id ?>" class="button is-danger is-rounded"><i class="fa fa-book"></i> Đọc từ đầu</a></li>
                    <li class="li02"><a href="/<?php echo $comic->id ?>/<?php echo $chapters->last()->id ?>" class="button is-danger is-rounded  "><i class="fa fa-book"></i> Đọc chương mới nhất</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <h3><i class="fa fa-info-circle"></i> Giới thiệu</h3>
        <div class="story-detail-info detail-content readmore-js-section readmore-js-collapsed">
            <p><?php echo $comic->description ?></p>
        </div>
        <h3><i class="fa fa-database" aria-hidden="true"></i> Danh sách chương</h3>
        <div class="list_chapter">
            <div class="works-chapter-list">
                <?php foreach ($chapters->reverse() as $chapter) : ?>
                    <div class="works-chapter-item">
                        <div class="col-md-10 col-sm-10 col-xs-8 name-chap">
                            <a class="" href="/<?php echo $comic->id ?>/<?php echo $chapter->id ?>">Chương <?php echo $chapter->index_chapter ?></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>