<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$profile = UserDAO::getByWebsiteSecret($_SESSION['USER_SECRET']);

if (!empty(trim($_POST['firstname'])) && !empty(trim($_POST['lastname'])) && !empty(trim($_POST['email']))){

  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

    $search_email = UserDAO::getByEmail($_POST['email']);
    if ($search_email == null || $search_email->getId() == $profile->getId()){

      if (UserDAO::updateProfile($profile->getId(), $_POST['firstname'], $_POST['lastname'], $_POST['email'])){
        echo "PROFILE_CHANGED";
      } else {
        echo $i18n['RETRIEVE_TECH_ERROR'];
      }

    } else {
      echo $i18n['PROFILE_EMAIL_USED'];
    }

  } else {
    echo $i18n['PROFILE_EMAIL_VALID'];
  }

} else {
  echo $i18n['PROFILE_CHECK_FIELDS'];
}

?>
