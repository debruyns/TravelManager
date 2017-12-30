<?php
    require_once 'includes/globals.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['SIGNUP_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/auth.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/login.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <header>
          <img src="images/logo.png" />
        </header>
        <div id="login-form">
            <h3><?= $i18n['SIGN_UP_MESSAGE']; ?></h3>
            <div id="error-message" class="error-message"></div>
            <div class="form-element">
                <label><?= $i18n['LABEL_FIRSTNAME']; ?></label>
                <input type="text" id="signup_firstname" placeholder="<?= $i18n['PLACEHOLDER_FIRSTNAME']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_LASTNAME']; ?></label>
                <input type="text" id="signup_lastname" placeholder="<?= $i18n['PLACEHOLDER_LASTNAME']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_EMAIL']; ?></label>
                <input type="email" id="signup_email" placeholder="<?= $i18n['PLACEHOLDER_EMAIL']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_PASSWORD']; ?></label>
                <input type="password" id="signup_password" placeholder="<?= $i18n['PLACEHOLDER_PASSWORD']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_PASSWORD_2']; ?></label>
                <input type="password" id="signup_password" placeholder="<?= $i18n['PLACEHOLDER_PASSWORD_2']; ?>" />
            </div>
            <button id="login_button"><?= $i18n['BUTTON_SIGN_UP']; ?></button>
            <div class="login-link">
                <h4><?= $i18n['LABEL_LOGIN']; ?></h4>
                <a href="./login"><?= $i18n['LINKTEXT_LOGIN']; ?></a>
            </div>
            <div class="login-link">
                <h4><?= $i18n['LABEL_LANGUAGE']; ?></h4>
                <ul id="language-selection">
                    <?php
                        $languages = LanguageDAO::getActive();
                        $current_language = "";
                        foreach ($languages as $language){
                            if ($language->getCode() == $activeLanguage){
                                $current_language = "class='active'";
                            } else {
                                $current_language = "";
                            }
                            echo "<li ".$current_language." data-language='".$language->getName()."' data-code='".strtoupper($language->getCode())."'><img src='images/languages/". strtolower($language->getCode()).".png' /></li>";
                        }
                    ?>
                    <span id="language-tooltip"></span>
                </ul>
            </div>
        </div>
    </body>
</html>
