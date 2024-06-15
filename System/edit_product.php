<?php
include 'db_connect.php';

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $product_name = $_POST['NameProducts'];
  $old_price = $_POST['old_price'];
  $new_price = $_POST['new_price'];
  $Discount = $_POST['Discount'];
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];
  $Review_Num = $_POST['Review_Number'];

  //products Details table
// $product_ID = $_POST['id'];

  $Platform = $_POST['platform'];
  $can_activate_in = $_POST['can_activate_in'];
  $type = $_POST['type'];
  $version = $_POST['version'];
  $details = $_POST['details'];
  $key_features = $_POST['key_features'];
  $system_requirements_cpu = $_POST['system_requirements_cpu'];
  $system_requirements_ram = $_POST['system_requirements_ram'];
  $system_requirements_storage = $_POST['system_requirements_storage'];
  $system_requirements_gpu = $_POST['system_requirements_gpu'];
  $reviews_date = $_POST['reviews_date'];
  $reviews_name = $_POST['reviews_name'];
  $reviews_text = $_POST['reviews_text'];
  //products Details table

  $Offer_Date = $_POST['Offer_date'];
  $Type = $_POST['type'];

  if ($new_image !== "") {
    $update_filename = $new_image;
  } else {
    $update_filename = $old_image;

  }
  $path = "./assets/image pro/";


  $queryDetails = "UPDATE products_details
  SET platform = '$Platform',
      can_activate_in = '$can_activate_in',
      type = '$type',
      version = '$version',
      details = '$details',
      key_features = '$key_features',
      system_requirements_cpu = '$system_requirements_cpu',
      system_requirements_ram = '$system_requirements_ram',
      system_requirements_storage = '$system_requirements_storage',
      system_requirements_gpu = '$system_requirements_gpu',
      reviews_date = '$reviews_date',
      reviews_name = '$reviews_name',
      reviews_text = '$reviews_text' WHERE product_id = $id";

  $readQueryDetails = mysqli_query($conn, $queryDetails);

  // ...

  $query = "UPDATE products SET image='$update_filename' , product_name='$product_name', old_price ='$old_price', new_price ='$new_price', discount ='$Discount',review_number ='$Review_Num', Offer_date ='$Offer_Date' ,id_category='$Type' WHERE  id='$id'";
  $readQuery = mysqli_query($conn, $query);

  if ($readQuery && $readQueryDetails) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
      if (file_exists("./assets/image pro/" . $old_image)) {
        unlink($path . $old_image);

      }
    }
    echo "<script>alert('Update Successfully')</script>";
    echo "<script>window.location = 'index.php?page=product_list'</script>";
  }
}
?>
<div class="col-lg-12">
  <div class="card card-outline card-danger">
    <div class="card-header">      
      <div class="card-tools">
        <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_product"><i
            class="fa fa-plus"></i> Add Product</a>
      </div>
    </div>
    <div class="card-body">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $read = "SELECT products.*, categories.*, products_details.* FROM products JOIN categories 
        ON products.id_category = categories.categories_id JOIN products_details ON products.id = products_details.product_id WHERE products.id = '$id';";
        ;
        $result = mysqli_query($conn, $read);
        while ($row = mysqli_fetch_assoc($result)):
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row[$id] ? $id : '' ?>">
            <div class="row">
              <div class="col-md-6 border-right">

                <div class="form-group">
                  <label for="" class="control-label">Products Name</label>
                  <input type="text" class="form-control form-control-sm" name="NameProducts"
                    value="<?= $row['product_name'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Old price</label>
                  <input type="text" class="form-control form-control-sm" name="old_price" value="<?= $row['old_price'] ?>"
                  title="Please enter the correct Price up to 5 digits" required>
                </div>

                <div class="form-group">
                  <label for="" class="control-label">New price</label>
                  <input type="text" class="form-control form-control-sm" name="new_price" value="<?= $row['new_price'] ?>"
                  title="Please enter the correct Price up to 5 digits" required>
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Product Discount</label>
                  <input type="text" class="form-control form-control-sm" name="Discount" pattern="[0-9]+"
                  title="Please enter the correct Discount" value="<?= $row['discount'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Product Review Number</label>
                  <input type="text" class="form-control form-control-sm" name="Review_Number" pattern="[0-9]+"
                    title="Please enter a numeric value" value="<?= $row['review_number'] ?>">
                </div>

                <!--Date of the product discount-->
                <div class="form-group">
                  <label for="" class="control-label">Offer Date</label>
                  <input type="text" class="form-control form-control-sm" name="Offer_date"
                    value="<?= $row['Offer_date'] ?>">
                </div>
                <!--End Date of the product discount-->

                <br>
                <h2>Information</h2><br>

                <div class="form-group">
                  <label for="" class="control-label">platform</label>
                  <input type="text" class="form-control form-control-sm" name="platform" value="<?= $row['platform'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Can Activate In</label>
                  <input type="text" class="form-control form-control-sm" name="can_activate_in"
                    value="<?= $row['can_activate_in'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Type</label>
                  <input type="text" class="form-control form-control-sm" name="type" value="<?= $row['type'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Version</label>
                  <input type="text" class="form-control form-control-sm" name="version" value="<?= $row['version'] ?>">
                </div>

                <br>
                <h2>Details</h2><br>

                <div class="form-group">
                  <label for="" class="control-label">peoduct details</label>
                  <input type="text" class="form-control form-control-sm" name="details" value="<?= $row['details'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Key Features</label>
                  <input type="text" class="form-control form-control-sm" name="key_features"
                    value="<?= $row['key_features'] ?>">
                </div>

                <br>
                <h2>System Requirements</h2><br>

                <div class="form-group">
                  <label for="" class="control-label">System Cpu</label>
                  <input type="text" class="form-control form-control-sm" name="system_requirements_cpu"
                    value="<?= $row['system_requirements_cpu'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">System Ram</label>
                  <input type="text" class="form-control form-control-sm" name="system_requirements_ram"
                    value="<?= $row['system_requirements_ram'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">System storage</label>
                  <input type="text" class="form-control form-control-sm" name="system_requirements_storage"
                    value="<?= $row['system_requirements_storage'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">System Gpu</label>
                  <input type="text" class="form-control form-control-sm" name="system_requirements_gpu"
                    value="<?= $row['system_requirements_gpu'] ?>">
                </div>

                <br>
                <h2>Reviews</h2><br>

                <div class="form-group">
                  <label for="" class="control-label">Reviews Name</label>
                  <input type="text" class="form-control form-control-sm" name="reviews_name"
                    value="<?= $row['reviews_name'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Reviews Date</label>
                  <input type="text" class="form-control form-control-sm" name="reviews_date"
                    value="<?= $row['reviews_date'] ?>">
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Reviews Text</label>
                  <input type="text" class="form-control form-control-sm" name="reviews_text"
                    value="<?= $row['reviews_text'] ?>">
                </div>

                <!--////////////////////////////////////////////////////////////-->

                <?php
                $read = "SELECT DISTINCT categories_id , category_name FROM categories";
                $result = mysqli_query($conn, $read);
                ?>
                <div class="form-group">
                  <label for="" class="control-label">Category</label>
                  <select name="type" id="type" class="custom-select custom-select-sm">
                    <?php
                    while ($data = mysqli_fetch_assoc($result)):
                      ?>
                      <option value="<?php echo $data['categories_id'] ?>"><?php echo $data['category_name'] ?></option>
                      <?php
                    endwhile;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Picture</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>

                <div class="form-group d-flex justify-content-center align-items-center">
                  <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">

                  <img src="./assets/image pro/<?= $row['image'] ?>" class="card-img-top"
                    alt="./assets/image pro/<?= $row['image'] ?>" draggable="false" (dragstart)="false;">
                </div>
              </div>
            </div>
            <hr>
            <div class="col-lg-12 text-right justify-content-center d-flex">
              <button name="update" class="btn btn-primary mr-2">Save</button>
              <button class="btn btn-secondary" type="button"
                onclick="location.href = 'index.php?page=product_list'">Cancel</button>
            </div>
          </form>
        <?php endwhile;
      } ?>
    </div>
  </div>
</div>