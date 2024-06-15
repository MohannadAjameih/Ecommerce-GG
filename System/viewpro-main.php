<div class="card-group">
  <?php
  $query = "SELECT * FROM products,categories WHERE products.id_category = categories.categories_id";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)):
    ?>
    <div class="card mb-3 m-1">
      <img src="./assets/image pro/<?= $row['image'] ?>" class="card-img-top"
        alt="./assets/image pro/<?= $row['image'] ?>" draggable="false" (dragstart)="false;">
      <div class="card-body">
        <h5 class="card-title"> <b>
            <?= $row['product_name'] ?>
          </b></h5>
        <p class="card-text">
          <?= $row['category_name'] ?>
        </p>
        <a href="./index.php?page=edit_product&id=<?php echo $row['id'] ?>" class="btn btn-primary">EDIT</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>