<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$profile = UserDAO::getByWebsiteSecret($_SESSION['USER_SECRET']);

if (!empty($_POST['current']) && !empty($_POST['new']) && !empty($_POST['confirm'])){

  if (password_verify($_POST['current'], $profile->getPassword())){

    if (strlen($_POST['new']) >= 8){

      if ($_POST['new'] == $_POST['confirm']){

        $hash = password_hash($_POST['new'], PASSWORD_BCRYPT);
        if (UserDAO::updatePassword($profile->getId(), $hash)){
          echo "PASSWORD_CHANGED";
        } else {
          echo $i18n['PASSWORD_TECH_ERROR'];
        }

      } else {
        echo $i18n['PASSWORD_NO_MATCH'];
      }

    } else {
      echo $i18n['PASSWORD_SHORT'];
    }

  } else {
    echo $i18n['PASSWORD_INVALID_CURRENT'];
  }

} else {
  echo $i18n['PASSWORD_CHECK_FIELDS'];
}

?>
