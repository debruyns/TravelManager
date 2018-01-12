<?php

// Start a new session
session_start();

// Logout the current user
unset($_SESSION['USER_SECRET']);
unset($_SESSION['USER_DUALSTEP']);

?>
