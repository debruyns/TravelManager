<?php
// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$user = UserDAO::getById(1);
echo $user->getFirstname()." ".$user->getLastname();
?>
