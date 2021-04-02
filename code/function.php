<?php 
	
	// server connection
	include 'connection.php';
	
	//check category submitted or not 
	if (isset($_POST['category_submit'])) {
	 	
	 	//initialize variable
		$category_name=$_POST['category_name'];	

		//insert
		if ($category_name) {
			// category insert query
			$insert = "INSERT INTO category (name) VALUES ('$category_name')";
			$success = mysqli_query($conn, $insert);
			
			//check 
			if ($success) {
				echo "<script>
						alert('Success!, category submitted');
						window.location='../pages/category.php';
					  </script>";
			}
		}
	}

	// product data submitted
	if (isset($_POST['product_submit']))
	 {
	 	//initialize variable
		$name=$_POST['name'];	
		$price=$_POST['price'];	
		$category=$_POST['category'];	
		
		//set file derectory
	 	$target_dir="../files/";
	 	$target_dir=$target_dir.basename($_FILES['product_img']['name']);
	 	$product_img = basename($_FILES['product_img']['name']);
	 	
	 	if (move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir)) {
	 	 	$insertProduct = "INSERT INTO product (name, price, picture, category) VALUES('$name', '$price', '$product_img', '$category')";
			mysqli_query($conn, $insertProduct);
			echo "<script>
					alert('Product created...');
					window.location='../pages/product.php';
				  </script>";
	 	 } else {
	 	 	echo "<script>
	 	 			alert('Error in Image uploading...')
	 	 			window.location='../pages/product.php';
	 	 		</script>";
	 	 }	
	 }
	 

	//Update product

  	if (isset($_GET['updt'])) {
	 	
	 	$id=$_GET['updt']; 
		$name=$_POST['name'];
		$price=$_POST['price'];
		$category=$_POST['category'];
		
		//set file derectory
	 	$target_dir="../files/";
	 	
	 	$target_dir=$target_dir.basename($_FILES['product_img']['name']);
	 	$product_img = basename($_FILES['product_img']['name']);
	 	$moveFile = move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir);
	 	
		// check image available or not 	
	 	if ($product_img!=="") {
			$update = "UPDATE product SET name='$name',price='$price',picture='$product_img',category='$category' where id='$id'";
			$res=mysqli_query($conn, $update);
	 		
			if ($res) {
				echo "<script>alert('update successfully...'); window.location='../pages/list.php';</script>";
			}
	 	} else {
	 		$update = "UPDATE product SET name='$name',price='$price',category='$category' where id='$id'";
			$res=mysqli_query($conn, $update);
	 		
			if ($res) {
				echo "<script>alert('update successfully...'); window.location='../pages/list.php';</script>";
			}
	 	}

	}


 ?>