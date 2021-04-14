<?php 
//extra requre files
require_once '../database/database.php';

//Global 
$regex_Alphanumeric = '/^[\w\s-]+$/'; 
$regex_price = '/^\d+(\.\d{1,2})?$/';

$product = new Product($db);	//create product object

// product data insertion
if (isset($_POST['product_submit'])) {
 	
 	$name=$_POST['name'];	
	$price=$_POST['price'];	
	$category=$_POST['category'];	
	
 	$target_dir="../../files/";
 	$target_dir=$target_dir.basename($_FILES['product_img']['name']);
 	$product_img = basename($_FILES['product_img']['name']);
 	
	$valid_Name = $product->validate_Data($regex_Alphanumeric, $name, "Name");
	$valid_Price = $product->validate_Data($regex_price, $price, "Price");
	$valid_Category = $product->validate_Data($regex_Alphanumeric, $category, "Category");
 	
 	if ($valid_Name && $valid_Price && $valid_Category) 
 	{
 		$data = array(
			'name' => $name,
			'price' => $price,
			'picture' => $product_img,
			'category' => $category
		);

 		$product->add($data, $product_img, $target_dir);				
 	} else {
 		echo "<script>alert('Please, Enter details');</script>";
 		header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
 	}
}

//update product
if (isset($_GET['updt'])) {
	
	$id=$_GET['updt']; 
	$name=$_POST['name'];
	$price=$_POST['price'];
	$category=$_POST['category'];

	$target_dir="../files/";
 	$target_dir = $target_dir.basename($_FILES['product_img']['name']);
 	$product_img = basename($_FILES['product_img']['name']);

 	$valid_Name = $product->validate_Data($regex_Alphanumeric, $name, "Name");
	$valid_Price = $product->validate_Data($regex_price, $price, "Price");
	$valid_Category = $product->validate_Data($regex_Alphanumeric, $category, "Category");

	if ($valid_Name && $valid_Price && $valid_Category) 
 	{
 		$data = array(
			'name' => $name,
			'price' => $price,
			'picture' => $product_img,
			'category' => $category
		);

 		$product->update($id, 'product', $data);				
 	} else {
 		echo "<script>alert('Please, Enter details');</script>";
 		header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
 	}
 	
}	

//delete product
if (isset($_GET['id'])) { 
		
	$id = $_GET['id'];
	$product->delete('product', $id);
}
	
class Product
{
	public $db;
	
	public function __contruct($db)
	{
		$this->db = $db;
	}

	public function add($data, $image, $target_dir)
	{	
		global $db;
		if ($image) { 
			$this->validateImage($image, $target_dir); 
		}
 		if ($db->insert('product', $data)) {
 			echo "<script>alert('Product created...');</script>";
 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
 		}
 		else
 		{
 			echo "<script>alert('Something wrong...');</script>";
 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
 		}
	}

	public function update($id, $table, $data)
	{	
		global $db;
		if (is_numeric($id)) {
			if ($db->update($id, $table, $data)) {
	 			echo "<script>alert('Product updated...');</script>";
	 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
	 		}
	 		else
	 		{
	 			echo "<script>alert('Something wrong...');</script>";
	 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
	 		}
	 	}
	 	else{
	    	echo "<script>alert('ID or record not found...');</script>";
 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
	    }
	}

	public function delete($table, $id)
	{
	    global $db; echo $id;
	    if (is_numeric($id)) {
			if ($db->delete($table, $id)) {
				echo "<script>alert('Product deleted...');</script>";
	 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
			}
			else
			{
	 			echo "<script>alert('Something wrong...');</script>";
	 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
	 		}
	    }
	    else{
	    	echo "<script>alert('ID or record not found...');</script>";
 			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
	    }
	}

	//validate image
	private function validateImage($image, $target_dir) 
	{
	 	$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
		if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
		    echo "<script>alert('Please, Select only jpg & png file format');</script>";
		    header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
		}
		//move image
		$moveFile = move_uploaded_file($_FILES['product_img']['tmp_name'], $target_dir);
		if (!$moveFile) {
			echo "<script>alert('Error in Image uploading...')</script>";
			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
		}
		return $moveFile;
	}
	//validate data
	public function validate_Data($regex, $data, $msg)
	{
		$valid = preg_match($regex, $data);
		if (!$valid) {
			echo "<script>alert('Please, Enter valid $msg...')</script>";
			header("Location: " . $_SERVER["HTTP_REFERER"]); exit();
		}
		return $valid;
	}
}

 ?>