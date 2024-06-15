<?php include 'db_connect.php' ?>
<?php 

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$read = "SELECT * FROM categories where categories_id='$id'";
	$result = mysqli_query($conn, $read);
	while ($row = mysqli_fetch_assoc($result)):
		?>
		<div class="container-fluid">
			<div class="card card-widget widget-user shadow">
				<div class="widget-user-header bg-dark">
					<h3 class="widget-user-username">
						<?= $row['category_name'] ?>
					</h3>
					
				</div>
				<div class="widget-user-image">
					
				</div>

				<div class="card-footer">
					<div class="container-fluid">
						<dl>
							<dt>Category</dt>
							<dd>
								<?= $row['category_name'] ?>
							</dd>

							<dt>Category Description</dt>
							<dd>
								<?= $row['category_description'] ?>
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
		onclick="window.location='index.php?page=category_list'">Close</button>
</div>
<style>
	#uni_modal .modal-footer {
		display: none
	}

	#uni_modal .modal-footer.display {
		display: flex
	}
</style>