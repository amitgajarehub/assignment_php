<?php 
/* server connectivity using MySQLi (Object-Oriented) */
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "ns_php";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//echo "Connected successfully";
?>