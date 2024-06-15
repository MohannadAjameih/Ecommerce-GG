<?php include('db_connect.php') ?>
<?php
$twhere = "";
if ($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<div class="col-12">
  <div class="card">
    <div class="card-body">
      Welcome
      <?php echo $_SESSION['login_name'] ?>!
    </div>
  </div>
</div>
<hr>
<?php
$where = "";
if ($_SESSION['login_type'] == 2) {
  $where = " where manager_id = '{$_SESSION['login_id']}' ";
} elseif ($_SESSION['login_type'] == 3) {
  $where = " where concat('[',REPLACE(user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
}
$where2 = "";
if ($_SESSION['login_type'] == 2) {
  $where2 = " where p.manager_id = '{$_SESSION['login_id']}' ";
} elseif ($_SESSION['login_type'] == 3) {
  $where2 = " where concat('[',REPLACE(p.user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
}
?>
<?php
if (isset($_POST['update'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];
  $portfolio_status = isset($_POST['Status']) ? '1' : '0';

  if ($new_image !== "") {
    $update_filename = $new_image;
  } else {
    $update_filename = $old_image;

  }
  $path = "./assets/pic nav/";
  $query = "UPDATE homepage SET navbar='$update_filename', F_name_comp='$firstname', L_name_comp ='$lastname' WHERE 2";
  $Read_query = mysqli_query($conn, $query);
  if ($Read_query) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
      if (file_exists("../assets/pic nav/" . $old_image)) {
        unlink($path . $old_image);
      }
    }
    echo "<script>alert('Update Successfully')</script>";
  }
}
?>
<?php
if (isset($_POST['btn-save'])) {
  $title = $_POST['title'];
  $about_title = $_POST['about-title'];
  $description = $_POST['description'];
  $query = "UPDATE page_about SET section_header='$title', about_title='$about_title', description ='$description' WHERE 1";
  $Read_query = mysqli_query($conn, $query);
  if ($Read_query) {
    echo "<script>alert('Update Successfully')</script>";
  } else {
    echo "<script>alert('not data')</script>";
  }
}
?>
<div class="row ">
  <div class="col-md-6">
    <div class="card card-outline card-danger">
      <div class="card-header d-flex align-item-center">
        <b style="margin-right: 4rem;">Page Logo</b>
        <div class="offset-md-3">
          <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i
              class="bi bi-pencil-square"></i> View Logo</a>
        </div>
      </div>
      <?php
      $query = "Select * from homepage";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)):
        ?>
        <div class="card-body p-0">
          <ul class="list-group list-group-flush">
            <span class="text-xs" style="font-size: 15px;">
              <div class="card-header d-flex align-item-center">
                <b>Logo : <span class="text-dark ms-sm-2 font-weight-bold"><img
                      src="./assets/pic nav/<?php echo $row['navbar']; ?>" alt="" width="100px" height="100px"></span></b>
              </div>
            </span>
            <?php
      endwhile;
      ?>
        </ul>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog   ">
          <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Page Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
              $query = "Select * from homepage";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($result)):
                ?>
                <div class="modal-body">
                  <div class="card">
                    <div class="card-body">
                      <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
                      <div class="form-group">
                        <label for="name">First Name Company</label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                          value="<?= $row['F_name_comp']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="name">Last Name Company</label>
                        <input type="text" name="lastname" id="lastname" class="form-control"
                          value="<?= $row['L_name_comp']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-form-label">Old Logo</label>
                        <input type="hidden" name="old_image" value="<?php echo $row['navbar']; ?>">
                        <img src="./assets/pic nav/<?php echo $row['navbar']; ?>"
                          alt="./pictuer/<?php echo $row['navbar']; ?>" id="cimg" class="img-fluid img-thumbnail">
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Picture</label>
                        <div class="custom-file">
                          <input accept=".png,.PNG,.jpg,.JPG" type="file" name="image"
                            class="custom-file-input rounded-circle" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                      <style>
                        img#cimg {
                          height: 15vh;
                          width: 15vh;
                          object-fit: cover;
                          border-radius: 100% 100%;
                        }
                      </style>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button name="update" type="submit" id="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <form action="" method="post">
    <div class="modal fade" id="about" tabindex="-1" aria-labelledby="about" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit about</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <?php
                $query = "Select * from page_about";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)):
                  ?>
                  <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" id="firstname" class="form-control"
                      value="<?= $row['section_header']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="name">About Title</label>
                    <input type="text" name="about-title" id="lastname" class="form-control"
                      value="<?= $row['about_title']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Paragraph</label>
                    <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
                                          <?= $row['description'] ?>
                                        </textarea>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="btn-save" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- x -->
  <div class="col-md-6">
    <div class="card card-outline card-danger">
      <div class="card-header d-flex align-item-center">
        <b style="margin-right: 4rem;">Products</b>
        <div class="  offset-md-3">
          <a class="btn btn-success btn-sm  " href="./index.php?page=new_product"><i class="fa fa-plus"></i> Add New
            Product</a>
        </div>
      </div>
      <div class="card-body  p-4">
        <div class="card-header    d-flex justify-content-between">
          <b style="font-size: 0.9rem;">Product Interface</b>
          <div class="col-2 offset-6 ">
            <a class="btn btn-warning btn-sm" href="./index.php?page=viewpro-main"><i class="fa fa-show"></i> VIEW</a>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>
<!--
  <div class="col-md-6">
    <div class="card card-outline card-danger">
      <div class="card-header d-flex align-item-center">
        <b style="margin-right: 4rem;">E-ommerce PAGE</b><!--here we can use it or remove it-
        <div class="  offset-md-3">
          <a class="btn btn-success btn-sm  " href="./index.php?page=new_screen"><i class="fa fa-plus"></i> Add New
            Picture</a>
        </div>
      </div>
      <div class="card-body  p-4">
        <div class="card-header    d-flex justify-content-between">
          <b style="font-size: 0.9rem;">Main Interface</b>
          <div class="col-2 offset-6 ">
            <a class="btn btn-warning btn-sm" href="./index.php?page=viewpro-main"><i class="fa fa-show"></i> VIEW</a>
          </div>
        </div>
        <div class="card-header d-flex  d-flex justify-content-between">
          <b style="font-size: 0.9rem;">Edit in Laptop Screen</b>
          <div class="col-2 offset-5">
            <a class="btn btn-warning btn-sm" href="./index.php?page=view screen"><i class="fa fa-show"></i> VIEW</a>
          </div>
        </div>
      </div>
    </div>
  </div>
-->