<?php

$inTwoMonths = 60 * 60 * 24 * 60 + time();
$path = $_SERVER['DOCUMENT_ROOT'];
$activeLanguage = "EN";

if (!empty($_SESSION['CTO_LANG'])) {

    if (LanguageDAO::checkActive(strtoupper($_SESSION['CTO_LANG'])) == true) {
        if (file_exists($path . "/includes/languages/" . strtolower($_SESSION['CTO_LANG']) . ".language.php")) {
            require_once($path . '/includes/languages/' . strtolower($_SESSION['CTO_LANG']) . '.language.php');
            $activeLanguage = strtoupper($_SESSION['CTO_LANG']);
        } else {
            setcookie("CTO_LANG", "EN", $inTwoMonths, '/');
            $_SESSION['CTO_LANG'] = "EN";
            require_once($path . '/includes/languages/en.language.php');
        }
    } else {
        setcookie("CTO_LANG", "EN", $inTwoMonths, '/');
        $_SESSION['CTO_LANG'] = "EN";
        require_once($path . '/includes/languages/en.language.php');
    }
} else {

    if (!empty($_COOKIE['CTO_LANG'])) {

        if (LanguageDAO::checkActive(strtoupper($_COOKIE['CTO_LANG'])) == true) {
            if (file_exists($path . "/includes/languages/" . strtolower($_COOKIE['CTO_LANG']) . ".language.php")) {
                require_once($path . '/includes/languages/' . strtolower($_COOKIE['CTO_LANG']) . '.language.php');
                $_SESSION['CTO_LANG'] = "EN";
                $activeLanguage = strtoupper($_COOKIE['CTO_LANG']);
            } else {
                setcookie("CTO_LANG", "EN", $inTwoMonths, '/');
                $_SESSION['CTO_LANG'] = "EN";
                require_once($path . '/includes/languages/en.language.php');
            }
        } else {
            setcookie("CTO_LANG", "EN", $inTwoMonths, '/');
            $_SESSION['CTO_LANG'] = "EN";
            require_once($path . '/includes/languages/en.language.php');
        }
    } else {
        setcookie("CTO_LANG", "EN", $inTwoMonths, '/');
        $_SESSION['CTO_LANG'] = "EN";
        require_once($path . '/includes/languages/en.language.php');
    }
}

