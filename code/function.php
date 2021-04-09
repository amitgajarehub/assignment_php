<?php 
	
	// server connection
	require_once 'connection.php';
	require_once 'product.php';

	function filter($id){
		$obj_Product = new Product("ns_php");
		$result = $obj_Product->select('product');

		while($array = mysqli_fetch_assoc($result) ) {
            $active_ids[] = (int)$array['id'];
	 	}
	 	return $filter = in_array($id, $active_ids);
	}

	//validate image file
	function validateImage($image) {
	 	if ($image) {
	 		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
			if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
			    echo "<script>
 	 				alert('Please, Select only jpg & png file format');
 	 				window.location='../pages/product.php';
 			    </script>";
			}
	 	}
	}
	
	//check category submitted or not 
	if (isset($_POST['category_submit'])) {
	 	
		$category_name=$_POST['category_name'];	

		//if category available
		if ($category_name) {
			
			// create array of data
			$data = array('name' => $category_name);
			
			$category = new Product("ns_php");
			$result = $category->insert('category', $data);
						
			//check 
			if ($result) {
				echo "<script>
						alert('Success!, category submitted');
						window.location='../pages/category.php';
					  </script>";
			}
		} else {
			echo "<script>
				alert('Please, Enter category first..');
				window.location='../pages/category.php';
			  </script>";
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

 		$regex_Alphanumeric = '/^[\w\s-]+$/'; 
 		$regex_price = '/^\d+(\.\d{1,2})?$/';
	 	if ($name) {
 	 		/*validateFields($regex_Alphanumeric, 'name');*/
 	 		$valid = preg_match($regex_Alphanumeric, $name);
 	 		if (!$valid) {
	 				echo "<script>
		 	 			alert('Please, Enter valid name...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
 		}
 		if ($price) {
 			$valid = preg_match($regex_price, $price);
 			if (!$valid) {
	 				echo "<script>
		 	 			alert('Please, Enter valid price...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
 		}
 		if ($category) {
 			$valid = preg_match($regex_Alphanumeric, $category);
 			if (!$valid) {
 				echo "<script>
		 	 			alert('Please, Enter valid category...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
 			}
 		}
	 	
	 	if ($name && $price && $category !== '') {

	 		if ($product_img) {
	 			validateImage($product_img);
	 			$moveFile = move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir);
	 			if (!$moveFile) {
	 				echo "<script>
		 	 			alert('Error in Image uploading...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
	 		}

	 		// create array of data
			$data = array(
				'name' => $name,
				'price' => $price,
				'picture' => $product_img,
				'category' => $category
			);

			$product = new Product("ns_php");
			$result = $product->insert('product', $data);

			echo "<script>
					alert('Product created...');
					window.location='../pages/product.php';
				  </script>";
	 	} else {
	 		echo "<script>
					alert('Please, Enter details');
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
	 	
	 	$target_dir = $target_dir.basename($_FILES['product_img']['name']);
	 	$product_img = basename($_FILES['product_img']['name']);
	 	
	 	$regex_Alphanumeric = '/^[\w\s-]+$/'; 
 		$regex_price = '/^\d+(\.\d{1,2})?$/';
	 	if ($name) {
 	 		/*validateFields($regex_Alphanumeric, 'name');*/
 	 		$valid = preg_match($regex_Alphanumeric, $name);
 	 		if (!$valid) {
	 				echo "<script>
		 	 			alert('Please, Enter valid name...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
 		}
 		if ($price) {
 			$valid = preg_match($regex_price, $price);
 			if (!$valid) {
	 				echo "<script>
		 	 			alert('Please, Enter valid price...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
 		}
 		if ($category) {
 			$valid = preg_match($regex_Alphanumeric, $category);
 			if (!$valid) {
 				echo "<script>
		 	 			alert('Please, Enter valid category...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
 			}
 		}
	 	
		if ($name && $price && $category !== '') {
	 		if ($product_img) {
	 			validateImage($product_img);	//validate image
	 			$moveFile = move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir);				// move file
	 			if (!$moveFile) {
	 				echo "<script>
		 	 			alert('Error in Image uploading...')
		 	 			window.location='../pages/product.php';
		 	 		</script>";
	 			}
	 		}

	 		// create array of data
			$data = array(
				'name' => $name,
				'price' => $price,
				'picture' => $product_img,
				'category' => $category
			);

			$product = new Product("ns_php");
			$result = $product->insert('product', $data);

			echo "<script>
					alert('Product created...');
					window.location='../pages/product.php';
				  </script>";
	 	} 
	}

 ?>