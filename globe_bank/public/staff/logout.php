<?php
require_once('../../private/init.php');

unset($_SESSION['username']);
// or you could use
// $_SESSION['username'] = NULL;

redirect_to(wwwRoot('/staff/login.php'));

?>
