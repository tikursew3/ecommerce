

<?php


include('../includes/connect.php');
include('../functions/common_function.php');


if (isset($_GET['delete_orders'])) {
    $delete_id = $_GET['delete_orders'];


    $delete_orders = "DELETE from `user_orders` where order_id=$delete_id";

    $result_orders = mysqli_query($conn, $delete_orders);
    if ($result_orders) {

        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>