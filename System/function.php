<?php
include('db_connect.php');
function message($url, $message)
{
    $_SESSION['status'] = $message;
    header('location:' . $url);
    exit();
}

function getallpro($table)
{
    global $conn;
    $query = "select * from $table where status='1'";
    return $query_run = mysqli_query($conn, $query);
}


function update_data($table)
{
    global $conn;
    $query = "update set * from $table where status='1'";
    return $query_run = mysqli_query($conn, $query);
}



if (isset($_POST['btn_delete'])) {
    $ID = $_POST['delete_ID'];
    // $delete_prot=mysqli_real_escape_string($conn,$_POST['delete_ID']);
    $delete_query = "DELETE FROM messages WHERE id='$ID'";
    $Read_query = mysqli_query($conn, $delete_query);
    if (!$Read_query) {
        echo '<script>alert("Could not delete data")</script>';
    } else {
        echo '<script>alert("Deleted data successfully")</script>';
        header("location:./index.php?page=Customer-Messages");

    }
}


?>