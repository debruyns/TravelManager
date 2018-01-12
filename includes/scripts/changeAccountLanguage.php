<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$profile = UserDAO::getByWebsiteSecret($_SESSION['USER_SECRET']);

if (LanguageDAO::checkActive($_POST['language'])){

  if (UserDAO::updateLanguage($profile->getId(), strtoupper($_POST['language']))){

    unset($_SESSION['CTO_LANG']);
    $_SESSION['CTO_LANG'] = strtoupper($_POST['language']);
    echo "LANGUAGE_CHANGED";

  } else {
    echo $i18n['LANGUAGE_INVALID'];
  }

} else {
  echo $i18n['LANGUAGE_INVALID'];
}

?>
