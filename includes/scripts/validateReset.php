<?php

  // Code to check if the reset code is valid

  $resetCode = $_GET['code'];
  $error_message = "";
  $show_form = false;

  if (strlen($resetCode) > 20){

    $recovery = PasswordRecoveryDAO::getPasswordRecovery($resetCode);
    if ($recovery != null){

      $now = strtotime(Date("Y-m-d H:i:s"));
      $validUntil = strtotime($recovery->getValidUntil());
      if ($validUntil > $now){

        if ($recovery->getUsed() == "0"){
          $error_message = "";
          $show_form = true;
        } else {
          $error_message = $i18n['RESET_USED'];
          $show_form = false;
        }

      } else {
        $error_message = $i18n['RESET_EXPIRED'];
        $show_form = false;
      }


    } else {
      $error_message = $i18n['RESET_NOT_VALID'];
      $show_form = false;
    }

  } else {
    $error_message = $i18n['RESET_NOT_VALID'];
    $show_form = false;
  }

?>
