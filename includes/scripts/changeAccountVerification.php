<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$profile = UserDAO::getByWebsiteSecret($_SESSION['USER_SECRET']);

if (!empty($_POST['code'])){

  $check_code = "";
  if ($profile->getDualStep() == "1"){
    $check_code = $profile->getDualStepCode();
  } else {
    $check_code = $_SESSION['DUALSTEP_NEW_CODE'];
  }

  if (!empty($check_code)){

    $auth = new Authenticator();
    $checkResult = $auth->verifyCode($check_code, $_POST['code'], 0);
    if ($checkResult){

      if ($profile->getDualStep() == "1"){

        if (UserDAO::deactivateDualStep($profile->getId())){
          echo "TWOSTEP_CHANGED";
        } else {
          echo $i18n['TWOSTEP_TECH_ERROR'];
        }

      } else {

        if (UserDAO::activateDualStep($profile->getId(), $check_code)){
          echo "TWOSTEP_CHANGED";
        } else {
          echo $i18n['TWOSTEP_TECH_ERROR'];
        }

      }

    } else {
      echo $i18n['TWOSTEP_CODE_INVALID'];
    }

  } else {
    echo $i18n['TWOSTEP_CODE_INVALID'];
  }

} else {
  echo $i18n['TWOSTEP_CODE_INVALID'];
}

?>
