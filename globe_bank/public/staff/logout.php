<?php
require_once('../../private/init.php');

//call log_out_admin() function
log_out_admin();

redirect_to(wwwRoot('/staff/login.php'));

?>
