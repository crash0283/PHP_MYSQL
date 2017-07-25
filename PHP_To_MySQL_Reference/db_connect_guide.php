<?php

    //This guide demonstrates the 5 fundamental steps
    //of database interaction using PHP

    //Credentials
    $dbhost = 'localhost';
    $dbuser = 'chris';
    $dbpass = 'chris';
    $dbname = 'globe_bank';

    //1.Create a database connection
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    //2. Perform database query

    //3. Use returned data (if any)

    //4.  Release returned data

    //5. Close database connection
    mysqli_close($connection);




?>