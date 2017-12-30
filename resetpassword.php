<?php
    require_once 'includes/globals.inc.php';
    require_once 'includes/scripts/validateReset.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['RESET_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/auth.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/resetpassword.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <header>
          <img src="images/logo.png" />
        </header>
        <div id="login-form">
            <h3><?= $i18n['RESET_MESSAGE']; ?></h3>
            <?php if ($error_message != "") { ?><div class="error-message-show"><?= $error_message ?></div><?php } ?>
            <div id="success-message" class="success-message"><?= $i18n['RESET_SUCCESS']; ?></div>
            <div id="error-message" class="error-message"></div>
            <?php if ($show_form == true){ ?>
            <div class="form-element">
                <label><?= $i18n['LABEL_PASSWORD']; ?></label>
                <input type="password" id="reset_password" placeholder="<?= $i18n['PLACEHOLDER_RESET_PASSWORD']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_PASSWORD_2']; ?></label>
                <input type="password" id="reset_password_2" placeholder="<?= $i18n['PLACEHOLDER_RESET_CONFIRM']; ?>" />
            </div>
            <input type="hidden" id="reset_code" value="<?= $_GET['code']; ?>" />
            <button id="reset_button"><?= $i18n['BUTTON_CHANGE_PASSWORD']; ?></button>
            <?php } ?>
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
