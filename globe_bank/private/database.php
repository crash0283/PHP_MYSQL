<?php
    //Store all functions required for database

    require_once('db_credentials.php');

    //Function for connecting to database
    function db_connect() {
        $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        //Check for error before connecting
        confirm_db_connect();
        return $connection;
    }

    //Function for disconnecting from database
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

    //Error checking function to see if we have connection
    function confirm_db_connect() {
        //Test if connection successful
        if (mysqli_connect_errno()) {
            $msg = 'Database connection failed: ' . mysqli_connect_error();
            exit($msg);
        }
    }

    //Error checking function to see if query was returned
    function confirm_result_set($result_set) {
        if(!$result_set) {
            exit('Database query failed');
        }
    }

?>