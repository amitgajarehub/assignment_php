<!--  server connection -->
<?php include '../code/connection.php';  ?>
		
<!DOCTYPE html>
<html>
	<?php include 'default_head.php';?>
<body>
	<!-- header -->
	<?php include 'header.php';?>

	<!-- content -->

	<!-- page title -->
	<div class="section banner_section who_we_help">
	  	<div class="container">
	  		<h4>Manage Products</h4>
	  	</div>
    </div>

    <div class="section content_section">
		<div class="container">
			<div class="filable_form_container">
				<div class="mange_buttons">
					<ul>
						<!--<li class="search_div">
					 <div class="Search">
					 	<input name="search" type="text" /> 
					 	<input type="submit" class="submit" value="submit">
					 </div>
						</li>-->
						<li><a href="product.php">Create Product</a></li>
						<li><a href="#">Delete</a></li>
					</ul>
				</div>
				<div class="table_container_block">
					<table width="100%">
						<thead>
							<tr>
							<th width="10%">
								<input type="checkbox" class="checkbox" id="checkbox_sample18"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample18"></label>
							</th>
							<th style="">Product Name</th>
							<th style="">Product Image</th>
							<th style="">Product Price</th>
							<th style="">Product Category</th>
							<th>Action</th>
							</tr>
						</thead>
						<?php $results = mysqli_query($conn, "SELECT * FROM product"); ?>
						<tbody>
							<?php while ($row = mysqli_fetch_array($results)) { ?>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" id="checkbox_sample19"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample19"></label>
								</td>
								<td><?php echo $row['name']; ?></td>
								<td style="text-align:center"><?php echo "<img src='../files/".$row['picture']."'height='auto' width='80px'>"; ?></td>
								<td style="text-align:right"><?php echo $row['price']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td>
									<div class="buttons">
									    <a href="../code/edit.php?id=<?php echo $row['id'];?>">
									  	  <button class="btn btn_edit">Edit</button>
									    </a>
									    <a href="../code/action/delete.php?id=<?php echo $row['id'];?>">
									  	  <button class="btn btn_delete">Delete</button>
									    </a>
									</div>								
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="pagination">
					<ul>
						<li><a href="#">first</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">Last</a></li>
					</ul>
				</div>
			</div>
		</div>		
    </div>


	<!-- footer start -->
	<?php include 'footer.php';?>
</body>
</html>