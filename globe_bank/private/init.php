<?php
    //Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    define('PRIVATE_PATH', dirname(__FILE__));
    define('PROJECT_PATH', dirname(PRIVATE_PATH));
    define('PUBLIC_PATH', PROJECT_PATH . '/public');
    define('SHARED_PATH', PRIVATE_PATH . '/shared');

    //Create constant for absolute path
    define('WWW_ROOT', '/PHP_MYSQL/globe_bank/public');

    require_once('functions.php');
