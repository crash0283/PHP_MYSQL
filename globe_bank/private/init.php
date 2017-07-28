<?php
    ob_start();  //output buffering is turned on

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
    require_once('database.php');
    require_once('query_functions.php');
    require_once('validation_functions.php');

    //Load and connect to database on all pages that have the init.php file imported
    //Also have the variable $db available to work with
    $db = db_connect();
    //Set $errors
    $errors = [];