<div class="content">
  <div class="div_middle">
    <!-- <div class="alert-note-fix"></div>
        <div class="alert alert-info alert-note">
          <b style="color: red">Đứt cáp quang biển nên hình đang load chậm mong các bạn thông cảm.</b><br />
          <b style="color: red"
            >Mua sim 4G trọn gói để đọc truyện nhanh hơn
            <a
              href="https://shopee.vn/universal-link/product/187617976/5518050434?utm_source=an_17326650029&amp;utm_medium=affiliates&amp;utm_campaign=-&amp;utm_content=aan-6-5-154-411"
              rel="nofollow noopener"
              class="vpn"
              target="_blank"
              >tại đây</a
            >.</b
          ><br />
        </div> -->

    <div class="main_content">
      <!-- banner.html -->
      <?php //require 'banner.php'; ?>
      <!-- schedule.html -->
      <?php //require 'schedule.php'; ?>
      <!-- suggest.html -->
      <?php //require 'suggest.php'; ?>
      <div id="main_homepage">
        <div class="homepage_tags">
          <h1>
            <p class="text_list_update">
              <a href="https://truyenqqmoi.com/truyen-moi-cap-nhat.html"><i class="fa fa-cloud-download"
                  aria-hidden="true"></i> Truyện mới cập nhật</a>
            </p>
          </h1>
          <div class="sort">
            <a href="https://truyenqqmoi.com/tim-kiem-nang-cao.html">
              <button><i class="fa fa-filter" aria-hidden="true"></i></button>
            </a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="list_grid_out">
          <ul class="list_grid grid" id="list_new">

            <?php foreach ($comics as $comic) {
              include 'components/comicItem.php';
            } ?>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
      <?php require 'components/paginate.php' ?>
    </div>
  </div>
  <div class="clear"></div>
</div>