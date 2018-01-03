<?php

  $error_message = "";
  $error_status = true;

  if (!empty($_GET['code'])){

    if (strlen($_GET['code']) > 10){

      $secret = substr($_GET['code'], 0, 10);
      $id = substr($_GET['code'], 10);
      $act_user = UserDAO::getById($id);
      if ($act_user != null){

        if ($act_user->getSecret() == $secret){

          if ($act_user->getActive() == "0"){

            UserDAO::updateActive($act_user->getId());
            $error_status = false;

          } else {
            $error_message = $i18n['ACTIVATE_CODE_USED'];
            $error_status = true;
          }

        } else {
          $error_message = $i18n['ACTIVATE_CODE_INVALID'];
          $error_status = true;
        }

      } else {
        $error_message = $i18n['ACTIVATE_CODE_INVALID'];
        $error_status = true;
      }

    } else {
      $error_message = $i18n['ACTIVATE_CODE_INVALID'];
      $error_status = true;
    }

  } else {
    $error_message = $i18n['ACTIVATE_CODE_INVALID'];
    $error_status = true;
  }
?>
