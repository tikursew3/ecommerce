

<?php

include('../includes/connect.php');
include('../functions/common_function.php');


if (isset($_GET['delete_users'])) {
    $delete_id = $_GET['delete_users'];


    $delete_users = "DELETE from `user_table` where user_id=$delete_id";
    $result_users = mysqli_query($conn, $delete_users);
    if ($result_users) {

        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>