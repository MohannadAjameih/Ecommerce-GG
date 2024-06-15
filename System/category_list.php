<?php include 'db_connect.php' ?>
<?php
if (isset($_POST['delete'])) {
    $delete_prot = mysqli_real_escape_string($conn, $_POST['delete_ID']);
    $delete_query = "DELETE FROM categories WHERE categories_id='$delete_prot'";
    $Read_query = mysqli_query($conn, $delete_query);
    if ($Read_query) {
        echo '<script>alert("Delete Record successfully")</script>';

    } else {
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
                        href="./index.php?page=new_category"><i class="fa fa-plus"></i> Add New Category</a>
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
                        <th>Category name</th>
                        <th>Category Description</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $where = "";
                    // Modify the conditions for your user roles if necessary
                    if ($_SESSION['login_type'] == 3) {
                        $where = " WHERE CategoryId  IN (SELECT category_id FROM categories WHERE user_id = {$_SESSION['login_id']})";
                    }
                    $qry = $conn->query("SELECT * FROM categories $where order by categories_id asc");

                    while ($row = $qry->fetch_assoc()):
                        ?>
                        <tr>
                            <th class="text-center">
                                <?php echo $i++ ?>
                            </th>
                            <td><b>
                                    <?php echo ($row['category_name']) ?>
                                </b></td>
                            <td><b>
                                    <?php echo ($row['category_description']) ?>
                                </b></td>
                            <td class="text-center">
                                <button type="button"
                                    class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item view_project"
                                        href="./index.php?page=view_category&id=<?php echo $row['categories_id'] ?>"
                                        data-id="<?php echo $row['categories_id'] ?>">View</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if ($_SESSION['login_type'] != 3): ?>
                                        <a class="dropdown-item"
                                            href="./index.php?page=edit_category&id=<?php echo $row['categories_id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="#" method="post">
                                            <input type="hidden" name="delete_ID" value="<?php echo $row['categories_id'] ?>">
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