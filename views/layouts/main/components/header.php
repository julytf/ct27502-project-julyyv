<header>
  <div class="top">
    <div class="div_middle">
      <div class="logo">
        <a href="/" title="Comic">
          <!-- <p class="pc_display"></p> -->
          <img class="pc_display" src="/img/logo_1000x166.png" alt="">
        </a>
        <div class="clear"></div>
      </div>
      <!-- TODO: -->
      <button id="setting_dark_mode" onclick="toggleDarkMode()" class="dark_mode">
        <i class="fa fa-lightbulb" aria-hidden="true"></i>
      </button>
      <div class="top_search">
        <form action="/">
          <input class="search" id="search_input" name="q" value="<?php echo $q ?? '' ?>" placeholder="Bạn muốn tìm truyện gì" />
          <button>
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="bottom">
    <div class="div_middle">
      <!-- TODO: tags -->
      <ul id="header_left_menu">
        <!-- <li class="menu_hidden">
          <a class="tags_name pc_hover" href="">Trinh Thám</a>
        </li>
        <li class="menu_hidden">
          <a class="tags_name pc_hover" href="">Hài Hước</a>
        </li> -->
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</header>

<script>
  if (localStorage.getItem('dark_mode'))
    setDarkMode(true)

  function setDarkMode(state) {
    document.querySelector('body').classList.toggle('dark', state)
    localStorage.setItem('dark_mode', state)
  }

  function toggleDarkMode(e) {
    document.querySelector('body').classList.toggle('dark')
    localStorage.setItem('dark_mode', localStorage.getItem('dark_mode') ? '' : 'true')
  }
</script>