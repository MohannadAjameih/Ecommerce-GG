<?php
include('db_connect.php');
?>
<div class="col-lg-12">
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$read = "SELECT * FROM careers where ID='$id'";

		$result = mysqli_query($conn, $read);

		while ($row = mysqli_fetch_assoc($result)):


			?>
			<?php
			if (isset($_POST['btn_s'])) {
				$prot_id = $_POST['prot_id'];
				$portfolio_status = isset($_POST['Status']) ? '1' : '0';
				$query = "UPDATE careers SET REMARKS= '$portfolio_status' WHERE ID ='$prot_id'";
				$Read_query = mysqli_query($conn, $query);
				if ($Read_query) {
					echo '<script>alert("updated successfully")</script>';
					echo '<script>window.location.href="index.php?page=Page Applicants"</script>';

				} else {
					echo '<script>alert("I got a problem deleting the data, please try again!!!!")</script>';
				}
			}

			?>

			<div class="card">
				<div class="card-header justify-content-center">
					<h4 class="justify-content-center">information about : </h4>
				</div>
				<div class="card-body">
					<form action="#" method="POST">
						<div class="row">
							<div class="col-md-6 border-right">
								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item list-group-item-secondary" style="width: 25%;">Email</li>
										<li class="list-group-item" style="width: 70%;">
											<?= $row['Email'] ?>
										</li>
									</ul>
								</div>

								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item list-group-item-secondary" style="width: 25%;">Country</li>
										<li class="list-group-item" style="width: 70%;">
											<?= $row['Country'] ?>
										</li>
									</ul>
								</div>

								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item list-group-item-secondary" style="width: 25%;">Position</li>
										<li class="list-group-item" style="width: 70%;">
											<?= $row['Position'] ?>
										</li>
									</ul>
								</div>
								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item list-group-item-secondary" style="width: 25%;">Phone</li>
										<li class="list-group-item" style="width: 70%;">
											<?= $row['zip_code'] . "-" . $row['Phone']; ?>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<h2><i class="fa fa-paperclip"></i> Attachment Files</h2>

								</div>
								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item list-group-item-secondary" style="width: 30%;">View Resume
										</li>
										<li class="list-group-item" style="width: 70%;"><a href="./files/<?= $row['CV'] ?>">
												View
												CV </a></li>
									</ul>
								</div>
								<div class="form-group">
									<ul class="list-group list-group-horizontal">
										<input type="hidden" name="prot_id" value="<?php echo $row['ID'] ?>">
										<li class="list-group-item list-group-item-secondary" style="width: 30%;">View Resume
										</li>
										<li class="list-group-item " style="width: 70%;">
											<input name="Status" <?php echo $row['REMARKS'] ? "checked" : "" ?> type="checkbox">
											<label class="form-check-label" for="defaultCheck1">
												Ignore
											</label>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<hr>
						<div class="col-lg-12 text-right justify-content-center d-flex">
							<button class="btn btn-primary mr-2">communicate with
								<?= $row['Full_Name'] ?>
							</button>
							<button name="btn_s" class="btn btn-primary mr-2">Save Changes</button>
							<button class="btn btn-secondary" type="button"
								onclick="location.href = 'index.php?page=Page Applicants'">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endwhile;
	} ?>
<style>
	img#cimg {
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	$('[name="password"],[name="cpass"]').keyup(function () {
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if (cpass == '' || pass == '') {
			$('#pass_match').attr('data-status', '')
		} else {
			if (cpass == pass) {
				$('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>')
			} else {
				$('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#manage_user').submit(function (e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if ($('[name="password"]').val() != '' && $('[name="cpass"]').val() != '') {
			if ($('#pass_match').attr('data-status') != 1) {
				if ($("[name='password']").val() != '') {
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
		$.ajax({
			url: 'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function (resp) {
				if (resp == 1) {
					alert_toast('Data successfully saved.', "success");
					setTimeout(function () {
						location.replace('index.php?page=user_list')
					}, 750)
				} else if (resp == 2) {
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>