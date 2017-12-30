<?php
    require_once 'includes/globals.inc.php';
    if (isset($_SESSION['USER_DUALSTEP'])){
      header("Location: /authentication");
    }
    if (isset($_SESSION['USER_SECRET'])){
      header("Location: /dashboard");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['LOGIN_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/auth.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
        <link rel="stylesheet" href="https://hosted-sip.civic.com/css/civic-modal.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/login.js" type="text/javascript"></script>
        <script src="https://hosted-sip.civic.com/js/civic.sip.min.js"></script>
        <script>
          var civicSip = new civic.sip({appId: 'CTO_TM'});
        </script>
    </head>
    <body>
        <header>
          <img src="images/logo.png" />
        </header>
        <div id="login-form">
            <h3><?= $i18n['SIGN_IN_MESSAGE']; ?></h3>
            <div id="error-message" class="error-message"></div>
            <?php
                if (!empty($_GET['a']) && $_GET['a'] == "logout"){
                    echo "<div id='logout-message' class='success-message-show'>".$i18n['TEXT_LOGOUT']."</div>";
                }
            ?>
            <div class="form-element">
                <label><?= $i18n['LABEL_EMAIL']; ?></label>
                <input type="email" id="login_email" placeholder="<?= $i18n['PLACEHOLDER_EMAIL']; ?>" />
            </div>
            <div class="form-element">
                <label><?= $i18n['LABEL_PASSWORD']; ?></label>
                <input type="password" id="login_password" placeholder="<?= $i18n['PLACEHOLDER_PASSWORD']; ?>" />
            </div>
            <button id="login_button"><?= $i18n['BUTTON_SIGN_IN']; ?></button>
            <button id="signupButton" class="civic-button-a medium" type="button">
              <span><?= $i18n['CIVIC_SIGNUP']; ?></span>
            </button>
            <div class="login-link">
                <h4><?= $i18n['LABEL_REGISTER']; ?></h4>
                <a href="./signup"><?= $i18n['LINKTEXT_REGISTER']; ?></a>
            </div>
            <div class="login-link">
                <h4><?= $i18n['LABEL_RETRIEVE']; ?></h4>
                <a href="./retrieve"><?= $i18n['LINKTEXT_RETRIEVE']; ?></a>
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
