<?php

	$mysql_host			= "localhost";
	$mysql_user			= "root";
	$mysql_password		= "adadech";
	$mysql_database		= "ipay";

	$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database);
	error_reporting(0);

// /* Database credentials. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'pembayaran');
 
// /* Attempt to connect to MySQL database */
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
?>