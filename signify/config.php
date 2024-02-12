<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'nimish');
define('DB_NAME', 'login');

// Try connecting to the Database
$conn = mysqli_connect('localhost', 'root', 'nimish', 'login',);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>
