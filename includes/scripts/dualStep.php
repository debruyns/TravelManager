<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

if (!empty($_POST['code'])){

  if (isset($_SESSION['USER_DUALSTEP'])){

    if (strlen($_SESSION['USER_DUALSTEP']) > 10){

      $user = UserDAO::getById(substr($_SESSION['USER_DUALSTEP'], 10));
      if ($user != null){

        if ($user->getDualStep() == "1"){

          $auth = new Authenticator();
          $checkResult = $auth->verifyCode($user->getDualStepCode(), $_POST['code'], 0);
          if ($checkResult){

            unset($_SESSION['USER_FIRSTNAME']);
            unset($_SESSION['USER_LASTNAME']);
            unset($_SESSION['USER_FULLNAME']);
            unset($_SESSION['USER_SECRET']);
            unset($_SESSION['USER_PREMIUM']);
            unset($_SESSION['USER_LANGUAGE']);
            unset($_SESSION['USER_DUALSTEP']);

            $_SESSION['USER_FIRSTNAME'] = $user->getFirstname();
            $_SESSION['USER_LASTNAME'] = $user->getLastname();
            $_SESSION['USER_FULLNAME'] = $user->getFirstname() . " " . $user->getLastname();
            $_SESSION['USER_SECRET'] = $user->getSecret().$user->getId();
            $_SESSION['USER_PREMIUM'] = $user->getPremium();
            $_SESSION['USER_LANGUAGE'] = $user->getLanguage();

            echo "USER_VERIFIED";

          } else {
            echo $i18n['VERIFICATION_NOT_VALID'];
          }

        } else {
          echo $i18n['RETRIEVE_TECH_ERROR'];
        }

      } else {
        echo $i18n['RETRIEVE_TECH_ERROR'];
      }

    } else {
      echo $i18n['RETRIEVE_TECH_ERROR'];
    }

  } else {
    echo $i18n['RETRIEVE_TECH_ERROR'];
  }

} else {
  echo $i18n['VERIFICATION_NOT_VALID'];
}

?>
