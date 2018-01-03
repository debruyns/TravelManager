<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

if (!empty($_POST['email'])){
  $user = UserDAO::getByEmail($_POST['email']);
  if ($user != null){
    if (PasswordRecoveryDAO::checkRecoveryAllowed($user->getId()) == true){
      $recovery = PasswordRecoveryDAO::createRecovery($user->getId());
      if ($recovery != null){
        $recoverycode = "".$recovery->getSecret().$recovery->getCode().$recovery->getUser();
        $content = $i18n['RETRIEVE_EMAIL_TITLE']." ".$user->getFirstname().",<br /><br />";
        $content .= $i18n['RETRIEVE_EMAIL_CONTENT']."<br /><br />";
        if ($_SERVER['SERVER_ADDR'] == "159.89.10.62"){
          $content .= "<a href='https://dev.citytakeoff.com/resetpassword/".$recoverycode."'>https://dev.citytakeoff.com/resetpassword/".$recoverycode."</a>";
        } else {
          $content .= "<a href='https://tm.citytakeoff.com/resetpassword/".$recoverycode."'>https://tm.citytakeoff.com/resetpassword/".$recoverycode."</a>";
        }
        if (sendEmailWithTemplate($user->getEmail(), $i18n['RETRIEVE_EMAIL_SUBJECT'], $content, "CityTakeOff <noreply@citytakeoff.com>")){
          echo "USER_RETRIEVED";
        } else {
          PasswordRecoveryDAO::deleteByCombination($recovery->getUser(), $recovery->getSecret(), $recovery->getCode());
          echo $i18n['RETRIEVE_TECH_ERROR'];
        }
      } else {
        echo $i18n['RETRIEVE_TECH_ERROR'];
      }
    } else {
      echo $i18n['RETRIEVE_MAX_DAILY'];
    }
  } else {
    echo $i18n['RETRIEVE_EMAIL_NOT_FOUND'];
  }
} else {
  echo $i18n['RETRIEVE_CHECK_FIELDS'];
}

?>
