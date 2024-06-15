<?php
include('db_connect.php');
session_start();
if (isset($_GET['id'])) {
	$product = $conn->query("SELECT * FROM products where id =" . $_GET['id']);
	foreach ($product->fetch_array() as $k => $v) {
		$meta[$k] = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
		<div class="form-group">
			<label for="name">Product Name</label>
			<input type="text" name="product_name" id="firstname" class="form-control"
				value="<?php echo isset($meta['product_name']) ? $meta['product_name'] : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Category Type</label>
			<input type="text" name="type" id="lastname" class="form-control"
				value="<?php echo isset($meta['type']) ? $meta['type'] : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="email">Old Price</label>
			<input type="text" name="old_price" id="email" class="form-control"
				value="<?php echo isset($meta['old_price']) ? $meta['old_price'] : '' ?>" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="email">new price</label>
			<input type="text" name="old_price" id="email" class="form-control"
				value="<?php echo isset($meta['new_price']) ? $meta['new_price'] : '' ?>" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="email">Discount</label>
			<input type="text" name="Discount" id="email" class="form-control"
				value="<?php echo isset($meta['Discount']) ? $meta['Discount'] : '' ?>" required autocomplete="off">
		</div>

		<div class="form-group">
			<label for="" class="control-label">Image</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img"
					onchange="displayImg(this,$(this))">
				<label class="custom-file-label" for="customFile">Choose file</label>
			</div>
		</div>
		<div class="form-group d-flex justify-content-center">
			<img src="<?php echo isset($meta['avatar']) ? 'assets/uploads/' . $meta['avatar'] : '' ?>" alt="" id="cimg"
				class="img-fluid img-thumbnail">
		</div>
	</form>
</div>
<style>
	img#cimg {
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#manage-user').submit(function (e) {
		e.preventDefault();
		start_load()
		$.ajax({
			url: 'ajax.php?action=update_product',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully saved", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)
				} else {
					$('#msg').html('<div class="alert alert-danger">product already exist</div>')
					end_load()
				}
			}
		})
	})

</script>