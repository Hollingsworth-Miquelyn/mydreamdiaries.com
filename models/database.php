<?php
$server ='localhost'; // This will be localhost for you.   
$dbname = 'mydrean5_mydreamdiaries';  //This will be the name of the database you create for your website. Create the database in phpmyadmin first. Mine had to have my username and a _ before the name of the database.   
$dsn = 'mysql:host='.$server.';dbname='.$dbname;  //here is where your server and database connect to each other  
$username = 'mydrean5_user';     // This will be the username for your hosting account.   
$password = 'pa55word';     // This will be the password you use for your hosting account.   
 
    try {
        $db = new PDO($dsn, $username, $password); // This trys to link your password and user name to your database 
        //echo "Success";
    } catch (PDOException $e) { // If there is an error with the connection, then it pulls the error message from the database_error.php file -->
        $error_message = $e->getMessage();
        include('views/database_error.php');
        exit();
    }
    
 ?>
