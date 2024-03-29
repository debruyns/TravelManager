<?php

// Start a new session
session_start();

// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include the required functions
require_once($path . '/includes/scripts/mailing.php');

// Include the required classes
require_once($path . '/includes/classes/connect.class.php');
require_once($path . '/includes/classes/authenticator.class.php');
require_once($path . '/includes/classes/language.class.php');
require_once($path . '/includes/classes/user.class.php');
require_once($path . '/includes/classes/passwordrecovery.class.php');

// Include the required DAO
require_once($path . '/includes/DAO/languageDAO.php');
require_once($path . '/includes/DAO/userDAO.php');
require_once($path . '/includes/DAO/passwordrecoveryDAO.php');

// Include the language control script
require_once($path . '/includes/languages/cookie.language.php');
