<?php
    //Start Session
    session_start();

    //Create constans to store non repeating values
    define('SITEURL', 'http://localhost/foodOrdering/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food_ordering');

    //Database connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    //Selecting Database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_errror());
?>