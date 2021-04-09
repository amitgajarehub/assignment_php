<?php 

	//include '../connection.php';
	require_once '../product.php';
	require_once '../function.php';

	if (isset($_GET['id'])) { 
		
		$id = $_GET['id'];
		if (filter($id)) {
			$product = new Product("ns_php");
			$result = $product->delete('product', $id);
		}else{
			echo "<script>
		 	 			alert('ID not found')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
		}
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

 ?>

