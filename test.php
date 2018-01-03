<?php
// Root location
$path = $_SERVER['DOCUMENT_ROOT'];

// Include classes and database connections
require_once($path . "/includes/globals.inc.php");

$user = UserDAO::createUser("Jef", "Williams", "debruynsam135@gmail.com", "testpassword");
echo $user->getFirstname()." ".$user->getLastname();
?>
