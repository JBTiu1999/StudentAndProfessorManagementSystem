<?php

	$dbServer = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "proglangs";
	
	$link = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

	if ($link -> connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		exit();
	  }
?>