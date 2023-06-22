<?php
// logout.php

// Start a session to access session variables
session_start();

// Destroy all session data
session_destroy();

// Redirect the user to the login page or any desired location
header("Location: login.php");
exit();
?>