<?php 
	require_once '../database/database.php';
/**
 * product category
 */

//check category submitted or not 
if (isset($_POST['category_submit'])) {
 	$category = new Category($db);	
 	$data = array('name' => $_POST['category_name']);
	$category->addCategory($data);
}

class Category {

	public $db;
	
	public function __contruct($db)
	{
		$this->db = $db;
	}

	public function addCategory($category)
	{	 
		global $db;
		if ($this->validateCategory($category)) { 
			if ($db->insert('category', $category)) {
				echo "<script>alert('Success!, category submitted');</script>";
				header("Location:", "../pages/category.php"); exit();
			}
		} else {
			echo "<script>alert('Please, Enter category first..');</script>";
		  	header("Location:", "../pages/category.php"); exit();
		}
	}

	// validate category
	private function validateCategory($category)
	{	$getCategory = trim(implode("",$category));
		return $matchCategory = preg_match('/^[\w\s-]+$/', $getCategory);
	}
}











 ?>