<?php
    require_once 'includes/globals.inc.php';
    if (!isset($_SESSION['USER_DUALSTEP'])){
      header("Location: /login");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['VERIFICATION_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/auth.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/verification.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <header>
          <img src="images/logo.png" />
        </header>
        <div id="login-form">
            <h3><?= $i18n['VERIFICATION_MESSAGE']; ?></h3>
            <div id="error-message" class="error-message"></div>
            <div class="form-element">
                <label><?= $i18n['LABEL_VERIFICATION']; ?></label>
                <input type="number" id="verification_code" placeholder="<?= $i18n['PLACEHOLDER_VERIFICATION']; ?>" />
            </div>
            <button id="verification_button" class="green"><?= $i18n['BUTTON_VERIFICATION']; ?></button>
            <button id="cancel_button" class="red"><?= $i18n['BUTTON_VERIFICATION_CANCEL']; ?></button>
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
