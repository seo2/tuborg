<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();



$cookie_name = 'id';
unset($_COOKIE[$cookie_name]);
$res = setcookie($cookie_name, '', time() - 3600);



echo 'logout';

?>