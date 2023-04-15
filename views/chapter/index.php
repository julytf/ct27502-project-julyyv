<div class="content">
    <div class="div_middle">
        <div class="main_content">
            <div id="chapter_content">
                <div class="chapter_content_div chapter_new_load">
                    <div class="box">
                        <div id="path" class="path-top">
                            <ol class="breadcrumb">
                                <li itemprop="itemListElement">
                                    <a itemprop="item">
                                        <span itemprop="name">Trang Chủ</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement">
                                    <a  href="/<?php echo $comic->id ?>" itemprop="item">
                                        <span itemprop="name"><?php echo $comic->name ?></span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement">
                                    <a itemprop="item">
                                        <span itemprop="name">Chương <?php echo $chapter->index_chapter ?></span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ol>
                        </div>
                        <div>
                            <h1 class="detail-title txt-primary"><a ><?php echo $comic->name ?></a> - Chương <?php echo $chapter->index_chapter ?></h1>
                        </div>
                        <div class="chapter-control">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="/<?php echo $comic->id ?>/<?php echo $previous_chapter_id ?>" class="btn btn-info go-btn prev text-white m-1 <?php if(!$previous_chapter_id) echo 'd-none' ?>" ><em class="fa fa-arrow-left"></em> Chap trước</a>
                                <a href="/<?php echo $comic->id ?>/<?php echo $next_chapter_id ?>" class="btn btn-info go-btn next text-white m-1 <?php if(!$next_chapter_id) echo 'd-none' ?>" >Chap sau <em class="fa fa-arrow-right"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="chapter_content">
                        <div>
                            <?php foreach ($images as $image) : ?>
                                <div id="page_1" class="page-chapter">
                                    <img class="lazy" src="/img/<?php echo $image->file ?>">
                                </div>
                            <?php endforeach ?>
                        </div>


                        <div class="clear"></div>

                    </div>

                    <div class="clear"></div>
                    <div class="box bottom-chap">
                        <div class="chapter-control">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="/<?php echo $comic->id ?>/<?php echo $previous_chapter_id ?>" class="btn btn-info go-btn prev text-white m-1 <?php if(!$previous_chapter_id) echo 'd-none' ?>" ><em class="fa fa-arrow-left"></em> Chap trước</a>
                                <a href="/<?php echo $comic->id ?>/<?php echo $next_chapter_id ?>" class="btn btn-info go-btn next text-white m-1 <?php if(!$next_chapter_id) echo 'd-none' ?>" >Chap sau <em class="fa fa-arrow-right"></em></a>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                                <li itemprop="itemListElement">
                                    <a itemprop="item">
                                        <span itemprop="name">Trang Chủ</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement">
                                    <a  href="/<?php echo $comic->id ?>" itemprop="item">
                                        <span itemprop="name"><?php echo $comic->name ?></span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement">
                                    <a itemprop="item">
                                        <span itemprop="name">Chương <?php echo $chapter->index_chapter ?></span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                        </ol>
                    </div>

                </div>
            </div>













        </div>
    </div>
    <div class="clear"></div>
</div>