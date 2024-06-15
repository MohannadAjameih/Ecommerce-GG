<?php
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];
  $status = isset($_POST['Status']) ? '1' : '0';
  if ($new_image !== "") {
    $update_filename = $new_image;
  } else {
    $update_filename = $old_image;
  }
  $path = "./assets/screen/";
  $query = "UPDATE laptopscreen SET screen='$update_filename', checkbox='$status' WHERE  ID='$id'";
  $Read_query = mysqli_query($conn, $query);
  if ($Read_query) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
      if (file_exists("./assets/image pro/" . $old_image)) {
        unlink($path . $old_image);
      }
    }
    echo "<script>alert('Update Successfully')</script>";
    echo '<script>window.location.href="index.php?page=view screen"</script>';
  }
}
?>
<div class="col-lg-12">
  <div class="card card-outline card-danger">
    <div class="card-body">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $read = "SELECT * FROM laptopscreen where ID='$id'";
        $result = mysqli_query($conn, $read);
        while ($row = mysqli_fetch_assoc($result)):
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row[$id] ? $id : '' ?>">
            <div class="row">
              <div class="col-md-6 border-right">
                <div class="form-group">
                  <label for="" class="control-label">Picture</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center">
                  <input type="hidden" name="old_image" value="<?php echo $row['screen']; ?>">
                  <img src="./assets/screen/<?= $row['screen'] ?>" class="card-img-top"
                    alt="./assets/image pro/<?= $row['screen'] ?>" draggable="false" (dragstart)="false;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <ul class="list-group list-group-horizontal">
                    <input type="hidden" name="prot_id" value="<?php echo $row['ID'] ?>">
                    <li class="list-group-item list-group-item-secondary" style="width: 30%;">View Resume</li>
                    <li class="list-group-item " style="width: 70%;">
                      <input name="Status" <?php echo $row['checkbox'] ? "checked" : "" ?> type="checkbox">
                      <label class="form-check-label" for="defaultCheck1">
                        visible
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-lg-12 text-right justify-content-center d-flex">
              <button name="update" class="btn btn-primary mr-2">Save</button>
              <button class="btn btn-secondary" type="button"
                onclick="location.href = 'index.php?page=view screen'">Cancel</button>
            </div>
          </form>
        <?php endwhile;
      } ?>
    </div>
  </div>
</div>