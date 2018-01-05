<?php
    require_once 'includes/globals.inc.php';
    if (!isset($_SESSION['USER_SECRET'])){
      header("Location: /login");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['LOGIN_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/general.js" type="text/javascript"></script>
    </head>
    <body>
      <header>
        <img src="images/logo.png" class="logo" />
        <a class="user-control" href="/account">
          <img src="images/account.png" />
          <?php if ($mobile_device == false) { echo "<span>".strtoupper($_SESSION['USER_FULLNAME'])."</span>"; } ?>
        </a>
        <span id="menu-sel">
          DASHBOARD
          <div id="menu-arrow"></div>
        </span>
      </header>
      <nav id="menu-list" <?php if ($mobile_device == true) { echo "class='mobile-menu'"; } ?>>
        <a href="/dashboard">Dashboard</a>
        <a href="/trips">My Trips</a>
        <a href="/account">My Account</a>
        <a href="/logout">Logout</a>
      </nav>
    </body>
</html>
