<?php
date_default_timezone_set('Asia/Manila'); 

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');


define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_sidyey');

// define('DB_USERNAME', 'u675792242_Bzdgm');
// define('DB_PASSWORD', '8R3UZci+I');
// define('DB_NAME', 'u675792242_5Vs8B');
 
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


