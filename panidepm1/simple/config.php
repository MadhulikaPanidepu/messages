<?php
/* Database credentials. */
define('DB_SERVER', 'mysqlservermadhu.mysql.database.azure.com');
define('DB_USERNAME', "panidepm1@mysqlservermadhu");
define('DB_PASSWORD', "ABCDabcd@9");
define('DB_NAME', "panidepm1_db");

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
