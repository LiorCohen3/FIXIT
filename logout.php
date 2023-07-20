<?php
session_start();

// Destroy the session to logout the user
session_destroy();

// Redirect the user to the login page
header('Location: login.php');
exit();
?>