<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '9UfhC%DHbC.G=tY.');
	define('DB_NAME', 'blabit');

	//create connection
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// check connection
	if ($mysqli->connect_error) {
		die("connection failed: " . $mysqli->connect_error);
	}
	//echo "database connected successfully";
?>