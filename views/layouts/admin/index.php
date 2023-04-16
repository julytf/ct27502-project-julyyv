<html lang="en" style="height: auto;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/adminlte2.css">

<body class="sidebar-mini layout-fixed" style="height: auto;">
  <div class="wrapper">
    <?php //require_once "components/header.php"; ?>

    <?php require 'components/sidebar.php' ?>
    <div class="content-wrapper" style="min-height: 100%;">
      <?php require_once "components/flash_messages.php"; ?>

      <?php require_once $body; ?>
    </div>

    <?php //require_once "components/footer.php"; ?>
  </div>
</body>

</html>