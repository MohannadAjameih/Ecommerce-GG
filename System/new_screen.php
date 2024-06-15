<?php
if (isset($_POST['save'])) {

	$portfolio_image = $_FILES['image']['name'];


	$path = "./assets/screen/";

	$portfolio_image_folder = $path . $portfolio_image;



	$insert = "INSERT INTO laptopscreen(screen) VALUES ('$portfolio_image')";
	$upload = mysqli_query($conn, $insert);
	if ($upload) {
		move_uploaded_file($_FILES['image']['tmp_name'], $portfolio_image_folder);
		//    message("./index.php","new portfolio added successfully");
		echo "<script>alert('Successfully inserted');</script>";
		echo '<script> window.location.href="index.php?page=view screen"</script>';

	} else {
		//  message("new_portfolio.php","The addition process has not been successfully done, please try again!");
		echo "<script>alert('fcak you');</script>";

	}
}
?>
<div class="col-lg-12">
	<div class="card card-outline card-danger">
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12 border-right">
						<div class="form-group">
							<label for="" class="control-label">Picture</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="image">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="col-lg-12 text-right justify-content-center d-flex">
							<button name="save" class="btn btn-primary mr-2">Save</button>
							<button class="btn btn-secondary" type="button"
								onclick="location.href = 'index.php?page=view all PORTFOLIO'">Cancel</button>
						</div>
			</form>
		</div>
	</div>
</div>