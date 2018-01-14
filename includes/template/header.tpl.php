<?php
    require_once 'includes/globals.inc.php';
    if (!isset($_SESSION['USER_SECRET'])){
      header("Location: /login");
    } else {
      if (!UserDAO::checkSecretValid($_SESSION['USER_SECRET'])){
        header("Location: /logout");
      } else {
        $auth_user = UserDAO::getByWebsiteSecret($_SESSION['USER_SECRET']);
      }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $page_title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
        <script src="js/general.js" type="text/javascript"></script>
    </head>
    <body>
      <header>
        <?php
          if ($mobile_device == false) {
            echo '<a class="logo" href="/dashboard"><img src="images/logo.png" /></a>';
          } else {
            echo '<a class="logo" href="/dashboard"><img src="images/logo-mobile.png" /></a>';
          }
        ?>
        <a class="user-control" href="/account">
          <img src="images/account.png" />
          <?php if ($auth_user->getPremium() == "1") { echo "<img src='images/premium.png' />"; } ?>
          <?php if ($mobile_device == false) { echo "<span>".strtoupper($auth_user->getFirstname()." ".$auth_user->getLastname())."</span>"; } ?>
        </a>
        <span id="menu-sel">
          <?= $page_title ?>
          <div id="menu-arrow"></div>
        </span>
      </header>
      <nav id="menu-list" <?php if ($mobile_device == true) { echo "class='mobile-menu'"; } ?>>
        <a href="/dashboard"><?= $i18n['PAGE_TITLE_INDEX']; ?></a>
        <a href="/trips"><?= $i18n['PAGE_TITLE_TRIPS']; ?></a>
        <a href="/account"><?= $i18n['PAGE_TITLE_ACCOUNT']; ?></a>
        <a href="/logout"><?= $i18n['PAGE_TITLE_LOGOUT']; ?></a>
      </nav>
