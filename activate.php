<?php
    require_once 'includes/globals.inc.php';
    require_once 'includes/scripts/activate.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <title><?= $i18n['ACTIVATE_TITLE']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/auth.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/activate.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <header>
          <img src="images/logo.png" />
        </header>
        <div id="login-form">
            <h3><?= $i18n['ACTIVATE_MESSAGE']; ?></h3>
            <?php if ($error_status == true){ ?>
              <div id="error-message" class="error-message-show"><?php echo $error_message; ?></div>
            <?php } else { ?>
              <div id="success-message" class="success-message-show"><?= $i18n['ACTIVATE_SUCCESS']; ?></div>
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
