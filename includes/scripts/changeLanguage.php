<?php

if (!empty($_POST['language'])){
    
    // Root location
    $path = $_SERVER['DOCUMENT_ROOT'];
    
    // Include classes and database connections
    require_once($path . "/includes/globals.inc.php");
    
    $newLanguage = "EN";
    if (LanguageDAO::checkActive($_POST['language']) == true){
        $newLanguage = strtoupper($_POST['language']);
    }
    
    $inTwoMonths = 60 * 60 * 24 * 60 + time();
    setcookie("CTO_LANG", $newLanguage, $inTwoMonths, '/');
    $_SESSION['CTO_LANG'] = $newLanguage;
    
    echo "LANGUAGE_CHANGED";
    
}

