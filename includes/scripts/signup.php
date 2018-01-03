<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])){

  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

    $check_mail = UserDAO::getByEmail($_POST['email']);
    if ($check_mail == null){

      if (strlen($_POST['password']) >= 8){

        if ($_POST['password'] == $_POST['confirm']){

          $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
          $created_user = UserDAO::createUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash);
          if ($created_user != null){
            $activationcode = "".$created_user->getSecret().$created_user->getId();
            $content = $i18n['RETRIEVE_EMAIL_TITLE']." ".$created_user->getFirstname().",<br /><br />";
            $content .= $i18n['SIGNUP_EMAIL_CONTENT']."<br /><br />";
            if ($_SERVER['SERVER_ADDR'] == "159.89.10.62"){
              $content .= "<a href='https://dev.citytakeoff.com/activateaccount/".$activationcode."'>https://dev.citytakeoff.com/activateaccount/".$activationcode."</a>";
              $sender = "CityTakeOff <noreply@dev.citytakeoff.com>";
            } else {
              $content .= "<a href='https://tm.citytakeoff.com/activateaccount/".$activationcode."'>https://tm.citytakeoff.com/activateaccount/".$activationcode."</a>";
              $sender = "CityTakeOff <noreply@tm.citytakeoff.com>";
            }
            if (sendEmailWithTemplate($created_user->getEmail(), $i18n['SIGNUP_EMAIL_SUBJECT'], $content, $sender)){
              echo "SIGNUP_COMPLETE";
            } else {
              UserDAO::deleteUserByEmail($created_user->getEmail());
              echo $i18n['RETRIEVE_TECH_ERROR'];
            }

          } else {
            echo $i18n['RETRIEVE_TECH_ERROR'];
          }

        } else {
          echo $i18n['SIGNUP_PASSWORD_MATCH'];
        }

      } else {
        echo $i18n['SIGNUP_PASSWORD_LENGTH'];
      }

    } else {
      echo $i18n['SIGNUP_EMAIL_USED'];
    }

  } else {
    echo $i18n['SIGNUP_EMAIL_VALID'];
  }

} else {
  echo $i18n['SIGNUP_CHECK_FIELDS'];
}

?>
