<?php
if (isset($_POST['save'])) {
	$categoryName = $_POST['categoryName'];
	$categoryDescription = $_POST['categoryDescription'];

	$path = "./assets/image pro/";

	$insert = "INSERT INTO categories(category_name,category_description) VALUES ('$categoryName','$categoryDescription')";
	$upload = mysqli_query($conn, $insert);


	if ($upload) {
		echo "<script>alert('Added Successfully');</script>";
		echo "<script>window.location = 'index.php?page=category_list'</script>";

	} else {
		echo "<script>alert('The addition process has not been successfully done, please try again');</script>";
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
							<label for="" class="control-label">Category Name</label>
							<input type="text" class="form-control form-control-sm" name="categoryName" required>
						</div>
						<div class="form-group" class="control-label">Category Description</label>
							<input type="text" class="form-control form-control-sm" name="categoryDescription">
						</div>
						<!--Adding the Category section-->
						<?php
						if ($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2) { // Admin user
							$read = "SELECT DISTINCT category_name FROM categories";
							$result = mysqli_query($conn, $read);
							?>
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
					</div>

				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button name="save" class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button"
						onclick="location.href = 'index.php?page=category_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>