<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

if (!empty($_POST['code'])){

  if (!empty($_POST['password']) && !empty($_POST['confirm'])){

    if ($_POST['password'] == $_POST['confirm']){

      if (strlen($_POST['password']) >= 8){

        if (strlen($_POST['code']) > 20){

          $recovery = PasswordRecoveryDAO::getPasswordRecovery($_POST['code']);
          if ($recovery != null){

            $now = strtotime(Date("Y-m-d H:i:s"));
            $validUntil = strtotime($recovery->getValidUntil());
            if ($validUntil > $now){

              if ($recovery->getUsed() == "0"){

                $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                if (PasswordRecoveryDAO::setAsUsed($recovery->getId())){

                  if (UserDAO::updatePassword($recovery->getUser(), $hash)){
                    echo "PASSWORD_RESET_COMPLETE";
                  } else {
                    echo $i18n['RETRIEVE_TECH_ERROR'];
                  }

                } else {
                  echo $i18n['RETRIEVE_TECH_ERROR'];
                }

              } else {
                echo $i18n['RESET_USED'];
              }

            } else {
              echo $i18n['RESET_EXPIRED'];
            }

          } else {
            echo $i18n['RESET_NOT_VALID'];
          }

        } else {
          echo $i18n['RESET_NOT_VALID'];
        }

      } else {
        echo $i18n['RESET_MIN_CHAR'];
      }

    } else {
      echo $i18n['RESET_NO_MATCH'];
    }

  } else {
    echo $i18n['RESET_CHECK_FIELDS'];
  }

} else {
  echo $i18n['RETRIEVE_TECH_ERROR'];
}

?>
