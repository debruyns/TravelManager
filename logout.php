<?php
	
	// Start a new session
	session_start();

	// Logout the current user
	unset($_SESSION['USER_FIRSTNAME']);
	unset($_SESSION['USER_LASTNAME']);
	unset($_SESSION['USER_FULLNAME']);
	unset($_SESSION['USER_SECRET']);
	unset($_SESSION['USER_PREMIUM']);
	unset($_SESSION['USER_LANGUAGE']);
	
	// Redirect to the login page
	header("Location: https://tm.citytakeoff.com/login?a=logout");

?>