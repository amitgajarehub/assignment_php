<?php 
	// server connection
	include 'connection.php';

	if (isset($_GET['id'])) {

		$id = $_GET['id'];
		$select = "SELECT * FROM product where id=$id";
		$q = mysqli_query($conn, $select);
		
		while ($res=mysqli_fetch_array($q)) {

		 	$id=$res['id'];
		 	$name=$res['name'];
		 	$price=$res['price'];
		 	$picture=$res['picture'];
		 	$category=$res['category'];
		}
	}	
 ?> 

<!DOCTYPE html>
	<?php include '../pages/default_head.php';?>
	<body>
		<!-- header -->
		<?php include '../pages/header.php';?>
		
		<!-- Page content -->

		<!-- page title -->
		<div class="section banner_section who_we_help">
		  	<div class="container">
		  		<h4>Create Product</h4>
		  	</div>
	    </div>
		
		<!-- product -->
		<form action="function.php?updt=<?php echo $id; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="section content_section">
				<div class="container">
					<div class="filable_form_container">
						<div class="form_container_block">
							<ul>
								<li class="fileds">
									<div class="name_fileds">
										<label>Product Name</label>
										<input name="name" type="text" value="<?php echo $name; ?>" required=""> 
									</div>
								</li>
								<li class="fileds">
									<div class="name_fileds">
										<label>Product Price</label>
										<input name="price" type="text" value="<?php echo $price; ?>" required=""> 
									</div>
								</li>
								<li class="fileds">
									<div class="upload_fileds">
										<label>Upload Image</label>
										<input id="uploadFile" name="product_img" type="file" placeholder="Choose File" class="mandatory_fildes" onchange="validateImage()" value=<?php echo $picture; ?>><?php echo "<img src='../files/".$picture."'height='60' width='100'>"; ?>
									</div>						
								</li>
								<li class="fileds">
									<div class="name_fileds">
										<label>Select Category</label>
										<select name="category" value="<?php echo $category; ?>" class="select category" style="z-index: 10; opacity: 0;" required>
											<option value="mobile" <?php echo (($category=="mobile")?"selected":"") ?>>Mobile</option>
											<option value="automobile" <?php echo (($category=="automobile")?"selected":"") ?>>Automobile</option>
										</select><span class="select">Mobile</span> 
									</div>
								</li>
							</ul>
							<div class="next_btn_block">
								<div class="next_btn">
									<button type="submit" name="updt">Submit  
										<span><img src="../web/images/small_triangle.png" alt="small_triangle"> </span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>		
		    </div>
		</form>

		<!-- footer start -->
		<?php include '../pages/footer.php';?>
	</body>
</html>