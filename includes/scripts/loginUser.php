<?php

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $user = UserDAO::getByEmail($_POST['email']);
    if ($user != null) {

        if (password_verify($_POST['password'], $user->getPassword())) {

            if ($user->getActive() == "1") {

                if ($user->getStatus() == "1") {

                    unset($_SESSION['USER_SECRET']);
                    unset($_SESSION['USER_DUALSTEP']);
                    unset($_SESSION['CTO_LANG']);

                    if ($user->getDualStep() == "1"){
                      $_SESSION['USER_DUALSTEP'] = $user->getSecret().$user->getId();
                    } else {
                      $_SESSION['USER_SECRET'] = $user->getSecret().$user->getId();
                      UserDAO::updateLastLogin($user->getId());
                    }

                    $_SESSION['CTO_LANG'] = $user->getLanguage();

                    echo "USER_AUTHORIZED";

                } else {
                    echo $i18n['LOGIN_CHECK_STATUS'];
                }
            } else {
                echo $i18n['LOGIN_CHECK_ACTIVE'];
            }
        } else {
            echo $i18n['LOGIN_CHECK_PASSWORD'];
        }
    } else {
        echo $i18n['LOGIN_CHECK_EMAIL'];
    }
} else {
    echo $i18n['LOGIN_CHECK_FIELDS'];
}
