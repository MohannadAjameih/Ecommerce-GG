<?php include 'db_connect.php' ?>

<?php
if (isset($_POST['delete'])) {
    $delete_prot = mysqli_real_escape_string($conn, $_POST['delete_ID']);

    // Begin the transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete from the 'products_details' table
        $delete_details_query = "DELETE FROM products_details
                                 WHERE product_id IN (
                                     SELECT id FROM products WHERE id = '$delete_prot'
                                 )";
        $delete_details_result = mysqli_query($conn, $delete_details_query);

        // Delete from the 'products' table
        $delete_products_query = "DELETE FROM products WHERE id = '$delete_prot'";
        $delete_products_result = mysqli_query($conn, $delete_products_query);

        if ($delete_details_result && $delete_products_result) {
            // Commit the transaction
            mysqli_commit($conn);
            echo '<script>alert("Delete Record successfully")</script>';
        } else {
            throw new Exception("Error in deleting data.");
        }
    } catch (Exception $e) {
        // Rollback the transaction
        mysqli_rollback($conn);
        echo '<script>alert("I got a problem deleting the data, please try again !!!!")</script>';
    }
}
?>


<div class="col-lg-12">
    <div class="card card-outline card-danger">

        <div class="card-header">
            <?php if ($_SESSION['login_type'] != 3): ?>
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary"
                        href="./index.php?page=new_product"><i class="fa fa-plus"></i> Add New Product</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-condensed" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="35%">
                    <col width="15%">
                    <col width="15%">
                    <col width="20%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>product name</th>
                        <th>Category</th>
                        <th>Old price</th>
                        <th>New price</th>
                        <th>Product Discount</th>
                        <th>Product Review Number</th>
                        <th>Offer Date</th>
                        <th>Picture</th>
                        <th>Category Number</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $type = array('', "Social Gift Card ", "Gaming Gift Card", "Software");

                    $where = "";

                    // Modify the conditions for your user roles if necessary
                    if ($_SESSION['login_type'] == 2) {
                        $where = " WHERE CategoryId  IN (SELECT id FROM categories WHERE manager_id = '{$_SESSION['login_id']}')";
                    } elseif ($_SESSION['login_type'] == 3) {
                        $where = " WHERE CategoryId  IN (SELECT category_id FROM categories WHERE user_id = {$_SESSION['login_id']})";
                    }

                    $qry = $conn->query("SELECT * FROM products,categories WHERE products.id_category =categories.categories_id");


                    while ($row = $qry->fetch_assoc()):
                        ?>
                        <tr>
                            <th class="text-center">
                                <?php echo $i++ ?>
                            </th>
                            <td><b>
                                    <?php echo ($row['product_name']) ?>
                                </b></td>
                            <td><b>
                                    <?php echo ($row['category_name']) ?>

                                </b></td>

                            <td><b>
                                    <?php echo number_format($row['old_price'], 2) ?>
                                </b></td>

                            <td><b>
                                    <?php echo number_format($row['new_price'], 2) ?>
                                </b></td>
                            <td><b>
                                    <?php echo $row['discount'] ?>%
                                </b></td>
                            <td><b>
                                    <?php echo $row['review_number'] ?>
                                </b></td>
                            <td><b>
                                    <?php echo $row['Offer_date'] ?>
                                </b></td>
                            <td>
                                <img src="assets/image pro/<?= $row['image'] ?>" alt="<?php echo $row['image'] ?>"
                                    width="50">
                            </td>
                            <td class="text-center">
                                <button type="button"
                                    class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item view_project"
                                        href="./index.php?page=view_product&id=<?php echo $row['id'] ?>"
                                        data-id="<?php echo $row['id'] ?>">View</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if ($_SESSION['login_type'] != 3): ?>
                                        <a class="dropdown-item"
                                            href="./index.php?page=edit_product&id=<?php echo $row['id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="#" method="post">
                                            <input type="hidden" name="delete_ID" value="<?php echo $row['id'] ?>">
                                            <button type="submit" class="dropdown-item" name="delete">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<style>
    table p {
        margin: unset !important;
    }

    table td {
        vertical-align: middle !important
    }
</style>



<script>
    $(document).ready(function () {
        $('#list').dataTable()
        $('.view_product').click(function () {
            uni_modal("<i class='fa fa-id-card'></i> Product Details", "view_product.php?id=" + $(this).attr('data-id'))
        })
        $('.delete_product').click(function () {
            _conf("Are you sure to delete this Product?", "delete_product", [$(this).attr('data-id')])
        })
    })
    function delete_product($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_product',
            method: 'POST',
            data: { id: $id },
            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 1500)

                }
            }
        })
    }
</script>