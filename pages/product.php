<!DOCTYPE html>
	<?php include 'default_head.php';?>
	<body>
		<!-- header -->
		<?php include 'header.php';?>
		
		<!-- Page content -->

		<!-- page title -->
		<div class="section banner_section who_we_help">
		  	<div class="container">
		  		<h4>Create Product</h4>
		  	</div>
	    </div>
		
		<!-- product -->
		<form action="../code/function.php" method="post" accept-charset="utf-8">
			<div class="section content_section">
				<div class="container">
					<div class="filable_form_container">
						<div class="form_container_block">
							<ul>
								<li class="fileds">
									<div class="name_fileds">
										<label>Product Name</label>
										<input name="name" type="text"> 
									</div>
								</li>
								<li class="fileds">
									<div class="name_fileds">
										<label>Product Price</label>
										<input name="price" type="text"> 
									</div>
								</li>
								<li class="fileds">
									<div class="upload_fileds">
										<label>Upload Image</label>
										<input id="uploadFile" name="product_img" type="file" placeholder="Choose File" class="mandatory_fildes">
									</div>						
								</li>
								<li class="fileds">
									<div class="name_fileds">
										<label>Select Category</label>
										<select name="category" class="select category" style="z-index: 10; opacity: 0;">
											<option value="mobile">Mobile</option>
											<option value="automobile">Automobile</option>
										</select><span class="select">Mobile</span> 
									</div>
								</li>
							</ul>
							<div class="next_btn_block">
								<div class="next_btn">
									<button type="submit" name="product_submit">Submit  
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
		<?php include 'footer.php';?>
	</body>
</html>