<!DOCTYPE html>
	
	<!-- head section-->
	<?php include 'default_head.php';?>

	<body>

		<!-- header -->
		<?php include 'header.php';?>
		
		<!-- content -->

		<!-- page title -->
		<div class="section banner_section who_we_help">
		  	<div class="container">
		  		<h4>Create Category</h4>
		  	</div>
	    </div>

	    <!-- submit category -->
	    	
	    <form action="../code/category/category.php" method="post" accept-charset="utf-8">
	      <div class="section content_section">
			<div class="container">
				<div class="filable_form_container">
					<div class="form_container_block">
						<ul>
							<li class="fileds">
								<div class="name_fileds">
									<label>Category Name</label>
									<input name="category_name" type="text"> 
								</div>
							</li>
						</ul>
						<div class="next_btn_block">
							<div class="next_btn">
								<button type="submit" name="category_submit">Submit 
									<span><img src="../web/images/small_triangle.png" alt="small_triangle"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
	    </form>
	    <!-- content end -->

		<!-- footer start -->
		<?php include 'footer.php';?>
	</body>
</html>