<html lang="vi" translate="no">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Comic</title>
  <link rel="icon" type="image/x-icon" href="/img/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preload" href="/font/quicksand-v8-vietnamese_latin-ext_latin-regular.woff2" as="font" type="font/woff" crossorigin="" />
  <link href="/css/style.css" type="text/css" rel="stylesheet" />
  <link href="/css/style.dark.css" type="text/css" rel="stylesheet" />
  <link href="/css/style2.css" type="text/css" rel="stylesheet" />
</head>

<body class="hompage">
  <?php require_once "components/header.php"; ?>
  <div class="content">
    <div class="div_middle">
      <?php require_once "components/flash_messages.php"; ?>
      <?php require_once $body; ?>
    </div>
  </div>
  <?php require_once "components/footer.php"; ?>
</body>

</html>