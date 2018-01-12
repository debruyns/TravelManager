<?php

	// Start a new session
	session_start();

	// Logout the current user
	unset($_SESSION['USER_SECRET']);

	// Redirect to the login page
	header("Location: /login?a=logout");

?>
