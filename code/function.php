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
	/*if (isset($_POST['product_submit']))
	 {
		$title=$_POST['name'];	
		$title=$_POST['price'];	
		//$title=$_POST['name'];	
		
		$flag=0;
	 	$target_dir="file/";
	 	$target_dir=$target_dir.basename($_FILES['product_img']['name']);
	 	if (move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir))
	 	 {
	 	 	$flag++;
	 	 	echo "<script>alert('Image uploaded')</script>";
	 	 }
	 	 else
	 	 {
	 	 	echo "<script>alert(' Error in Image uploading')</script>";
	 	 }	
		
		$product_img = basename($_FILES['product_img']['name']);


		if ($flag==1)
	    {
			$ins = "INSERT INTO blogtbl (title, content, product_img, blog_date, create_date, sort_order, status) VALUES('$title', '$mytextarea', '$product_img', '$blog_date', '$create_date', '$sort_order', '$status')";
			mysqli_query($con, $ins);
			echo "<script>alert('Blog Created...'); window.location='index.php';</script>";
		}
		else
		{
			echo "<script>alert('Something has wrong...'); window.location='index.php';</script>";	
		}

	 }*/



 ?>