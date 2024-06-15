<?php include 'db_connect.php' ?>
<?php
if (isset($_GET['id'])) {

	$id = $_GET['id'];

	$read = "SELECT p.*, c.category_name FROM products p JOIN 
	categories c ON p.id_category = c.categories_id WHERE p.id = '$id'";

	$result = mysqli_query($conn, $read);

	while ($row = mysqli_fetch_assoc($result)):


		?>
		<div class="container-fluid">
			<div class="card card-widget widget-user shadow">
				<div class="widget-user-header bg-dark">
					<h3 class="widget-user-username">
						<?= $row['product_name'] ?>
					</h3>
					<h5 class="widget-user-desc">
						<?= $row['category_name'] ?>
					</h5>
				</div>
				<div class="widget-user-image">

					<span
						class="brand-image img-circle elevation-2 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500"
						style="width: 90px;height:90px">
						<img class="img-circle elevation-2" src="assets/image pro/<?= $row['image'] ?>"
							alt="<?= $row['image'] ?>" style="width: 90px;height:90px;object-fit: cover">
					</span>


				</div>
				<div class="card-footer">
					<div class="container-fluid">
						<dl>
							<dt>Category</dt>
							<dd>
								<?= $row['category_name'] ?>
							</dd>
							<dt>Old Price</dt>
							<dd>
								$<?= $row['old_price'] ?>
							</dd>
							<dt>New Price</dt>
							<dd>
								$<?= $row['new_price'] ?>
							</dd>
							<dt>Discount</dt>
							<dd>
								<?= $row['discount'] ?>%
							</dd>
							<dt>Reviews</dt>
							<dd>
								<?= $row['review_number'] ?>
							</dd>
							<dt>Offer Date</dt>
							<dd>
								<?= $row['Offer_date'] ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		<?php endwhile;
} ?>
</div>
<div class="modal-footer display p-0 m-0">
	<button type="button" class="btn btn-secondary" data-dismiss="modal"
		onclick="window.location='index.php?page=product_list'">Close</button>
</div>
<style>
	#uni_modal .modal-footer {
		display: none
	}

	#uni_modal .modal-footer.display {
		display: flex
	}
</style>