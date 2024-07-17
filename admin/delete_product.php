<?php


include('../includes/connect.php');
include('../functions/common_function.php');


if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];


    $delete_product = "DELETE from `products` where product_id=$delete_id";
    $result_product = mysqli_query($conn, $delete_product);
    if ($result_product) {

        echo "<script>alert('product deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
