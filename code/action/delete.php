<?php 

	include '../connection.php';

	if (isset($_GET['id'])) { 
		
		$id = $_GET['id'];
		$delete = "DELETE FROM product where id=$id";
		mysqli_query($conn, $delete);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

 ?>

