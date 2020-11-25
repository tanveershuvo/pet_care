<?php
function connect($flag = TRUE)
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "petCareDB";
	// $charset="utf8mb4";

	//Create Connection
	if ($flag) {
		$con = new mysqli($servername, $username, $password, $dbName);
	} else {
		$con = new mysqli($servername, $username, $password);
	}

	//Check Connection
	if ($con->connect_error) {
		die("Connection failed: $con->connect_error");
	}

	//echo"Connected Successfully";

	return $con;
}
