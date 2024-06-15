<?php
if (isset($_POST['save'])) {
	// Retrieve form data for the 'products' table
	$NameProducts = $_POST['NameProducts'];
	$Type = $_POST['type'];
	$Old_price = $_POST['old_price'];
	$new_price = $_POST['new_price'];
	$Product_Discount = $_POST['Discount'];
	$Product_Review_Number = $_POST['Review_Number'];
	$Offer_Date = $_POST['Offer_date'];
	$portfolio_image = $_FILES['image']['name'];
	// Retrieve form data for the 'products_details' table
	$Platform = $_POST['platform'];
	$can_activate_in = $_POST['can_activate_in'];
	$type = $_POST['type'];
	$version = $_POST['version'];
	$details = $_POST['details'];
	$key_features = $_POST['key_features'];
	// $system_requirements_version = $_POST['system_requirements_version'];
	$system_requirements_cpu = $_POST['system_requirements_cpu'];
	$system_requirements_ram = $_POST['system_requirements_ram'];
	$system_requirements_storage = $_POST['system_requirements_storage'];
	$system_requirements_gpu = $_POST['system_requirements_gpu'];
	$reviews_date = $_POST['reviews_date'];
	$reviews_name = $_POST['reviews_name'];
	$reviews_text = $_POST['reviews_text'];

	$path = "./assets/image pro/";
	$portfolio_image_folder = $path . $portfolio_image;

	// Begin the transaction
	mysqli_begin_transaction($conn);

	try {
		// Insert into the 'products' table
		$insert_products = "INSERT INTO products (image, product_name, old_price, new_price, discount, review_number, Offer_date, id_category) VALUES ('$portfolio_image', '$NameProducts', '$Old_price', '$new_price', '$Product_Discount', '$Product_Review_Number', '$Offer_Date', '$Type')";
		$upload_products = mysqli_query($conn, $insert_products);

		// Get the last inserted ID from the 'products' table
		$last_id = mysqli_insert_id($conn);

		// Insert into the 'products_details' table
		$insert_products_details = "INSERT INTO products_details (product_id, platform, can_activate_in, type, version, details, key_features, system_requirements_cpu, system_requirements_ram, system_requirements_storage, system_requirements_gpu, reviews_date, reviews_name, reviews_text) 
		VALUES ('$last_id', '$Platform', '$can_activate_in', '$type', '$version', '$details', '$key_features', '$system_requirements_cpu', '$system_requirements_ram', '$system_requirements_storage', '$system_requirements_gpu', '$reviews_date', '$reviews_name', '$reviews_text')";
		$upload_products_details = mysqli_query($conn, $insert_products_details);

		if ($upload_products && $upload_products_details) {
			// Commit the transaction
			mysqli_commit($conn);
			move_uploaded_file($_FILES['image']['tmp_name'], $portfolio_image_folder);
			echo "<script>alert('Added Successfully');</script>";
			echo "<script>window.location = 'index.php?page=product_list'</script>";
		} else {
			throw new Exception("Error in inserting data.");
		}
	} catch (Exception $e) {
		// Rollback the transaction
		mysqli_rollback($conn);
		echo "<script>alert('The addition process has not been successfully done, please try again');</script>";
		echo "<script>window.location = 'index.php?page=product_list'</script>";
	}
}
?>

<div class="col-lg-12">
	<div class="card card-outline card-danger">
		<div class="card-body">
			<form action="" id="editProducts" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Product Name</label>
							<input type="text" class="form-control form-control-sm" name="NameProducts" required>
						</div>
						<div class="form-group" class="control-label">Old price</label>
							<input type="text" class="form-control form-control-sm" name="old_price" 
							required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">New price</label>
							<input type="text" class="form-control form-control-sm" name="new_price" 
							required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Product Discount</label>
							<input type="text" class="form-control form-control-sm" name="Discount">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Product Review Number</label>
							<input type="text" class="form-control form-control-sm" name="Review_Number">
						</div>

						<!--Date of the product discount-->
						<div class="form-group">
							<label for="" class="control-label">Offer Date</label>
							<input type="text" class="form-control form-control-sm" name="Offer_date">
						</div>
						<!--End Date of the product discount-->

						<br>
						<h2>Information</h2><br>
						<div class="form-group">
							<label for="" class="control-label">platform</label>
							<input type="text" class="form-control form-control-sm" name="platform" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Can Activate In</label>
							<input type="text" class="form-control form-control-sm" name="can_activate_in">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Type</label>
							<input type="text" class="form-control form-control-sm" name="typeInfo">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Version</label>
							<input type="text" class="form-control form-control-sm" name="version">
						</div>
						<br>
						<h2>Details</h2><br>
						<div class="form-group">
							<label for="" class="control-label">Product Details</label>
							<input type="text" class="form-control form-control-sm" name="details" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Key Features</label>
							<input type="text" class="form-control form-control-sm" name="key_features">
						</div>
						<br>
						<h2>System Requirements</h2><br>
						<!-- <div class="form-group">
							<label for="" class="control-label">System Version</label>
							<input type="text" class="form-control form-control-sm" name="system_requirements_version">
						</div> -->

						<div class="form-group">
							<label for="" class="control-label">System Cpu</label>
							<input type="text" class="form-control form-control-sm" name="system_requirements_cpu">
						</div>

						<div class="form-group">
							<label for="" class="control-label">System Ram</label>
							<input type="text" class="form-control form-control-sm" name="system_requirements_ram">
						</div>

						<div class="form-group">
							<label for="" class="control-label">System storage</label>
							<input type="text" class="form-control form-control-sm" name="system_requirements_storage">
						</div>

						<div class="form-group">
							<label for="" class="control-label">System Gpu</label>
							<input type="text" class="form-control form-control-sm" name="system_requirements_gpu">
						</div>

						<br>
						<h2>Reviews</h2><br>

						<div class="form-group">
							<label for="" class="control-label">Reviews Name</label>
							<input type="text" class="form-control form-control-sm" name="reviews_name">
						</div>

						<div class="form-group">
							<label for="" class="control-label">Reviews Date</label>
							<input type="text" class="form-control form-control-sm" name="reviews_date">
						</div>

						<div class="form-group">
							<label for="" class="control-label">Reviews Text</label>
							<input type="text" class="form-control form-control-sm" name="reviews_text">
						</div>

						<div class="form-group">
							<label for="" class="control-label">Picture</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="image">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<!--Adding the Category section-->
						<?php
						if ($_SESSION['login_type'] == 1 || $_SESSION['login_type'] ==2) { // Admin user
							$read = "SELECT DISTINCT categories_id , category_name FROM categories";
							$result = mysqli_query($conn, $read);
							?>
							<div class="form-group">
								<label for="" class="control-label">Category</label>
								<select name="type" id="type" class="custom-select custom-select-sm" required>
									<?php
									while ($data = mysqli_fetch_assoc($result)):
										?>
										<option value="<?php echo $data['categories_id'] ?>"><?php echo $data['category_name'] ?></option>
										<?php
									endwhile;
									?>
								</select>
							</div>
							<?php
						} else { // Regular user
							?>
							<div class="form-group">
								<label for="" class="control-label">Category</label>
								<select name="type" id="type" class="custom-select custom-select-sm">
									<option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Software
									</option>
									<option value="1" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Social Gift
										Card</option>
								</select>
							</div>
							<?php
						}
						?>
						<div class="form-group">
							<ul class="list-group list-group-horizontal">
								<li class="list-group-item list-group-item-secondary" style="width: 40%;">Component
									Status</li>
								<li class="list-group-item " style="width: 70%;">
									<input name="New" type="checkbox">
									<label class="form-check-label" for="defaultCheck1">
										New ?
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button name="save" class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button"
						onclick="location.href = 'index.php?page=product_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>