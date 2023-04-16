<div class="main_content">
  <div id="main_homepage">
    <div class="homepage_tags">
      <h1>
        <!-- <p class="text_list_update">
<a ><i class="fa fa-cloud-download"
  aria-hidden="true"></i> Truyện mới cập nhật</a>
</p> -->
      </h1>
      <div class="clear"></div>
    </div>
    <div class="list_grid_out">
      <ul class="list_grid grid" id="list_new">

        <?php foreach ($comics as $comic) {
          include 'components/comicItem.php';
        } ?>

        <?php if ($comics->count() === 0) echo "Rất tiếc, không tìm thấy kết quả nào!" ?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <?php require 'components/paginate.php' ?>
</div>