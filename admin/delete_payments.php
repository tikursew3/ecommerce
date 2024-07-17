

<?php


include('../includes/connect.php');
include('../functions/common_function.php');


if (isset($_GET['delete_payments'])) {
    $delete_id = $_GET['delete_payments'];


    $delete_payments = "DELETE from `user_payments` where payment_id=$delete_id";

    $result_payments = mysqli_query($conn, $delete_payments);
    if ($result_payments) {

        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>