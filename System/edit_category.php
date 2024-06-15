<?php
include 'db_connect.php';

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $CategoryName = $_POST['category_Name'];
  $categoryDescription = $_POST['categoryDescription'];

  $query = "UPDATE categories SET category_name='$CategoryName', category_description ='$categoryDescription' WHERE  categories_id='$id'";
  $Read_query = mysqli_query($conn, $query);
  if ($Read_query) {
    echo "<script>alert('Update Successfully')</script>";
    echo "<script>window.location = 'index.php?page=category_list'</script>";
  }
}
?>
<div class="col-lg-12">
  <div class="card card-outline card-danger">
    <div class="card-header">
      <div class="card-tools">
        <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_category"><i
            class="fa fa-plus"></i> Add New category</a>
      </div>
    </div>
    <div class="card-body">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $read = "SELECT * FROM categories WHERE categories.categories_id = '$id'";
        ;
        $result = mysqli_query($conn, $read);
        while ($row = mysqli_fetch_assoc($result)):
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['categories_id'] ? $id : '' ?>">
            <div class="row">
              <div class="col-md-6 border-right">

                <div class="form-group">
                  <label for="" class="control-label">Name Categories</label>
                  <input type="text" class="form-control form-control-sm" name="category_Name"
                    value="<?= $row['category_name'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="" class="control-label">Category Description</label>
                  <input type="text" class="form-control form-control-sm" name="categoryDescription"
                    value="<?= $row['category_description'] ?>">
                </div>
              </div>
            </div>
            <hr>
            <div class="col-lg-12 text-right justify-content-center d-flex">
              <button name="update" class="btn btn-primary mr-2">Save</button>
              <button class="btn btn-secondary" type="button"
                onclick="location.href = 'index.php?page=category_list'">Cancel</button>
            </div>
          </form>
        <?php endwhile;
      } ?>
    </div>
  </div>
</div>