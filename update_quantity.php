<?php
   
  include('./header.php');
   



//include('includes/connect.php');
global $conn;
//echo "<script>alert('entering in to code.') </script>";
    $get_ip_addr = getIPAddress();
   //echo "<script>alert('entering in to first. $get_ip_addr') </script>";
   
    if(isset($_GET['update_cart'])) {
        //echo "<script>alert('entering in to isset.') </script>";
        $quantities=$_POST['qty'];
        echo "<script>alert('entering in to query.') </script>";
    
        $update_cart = "UPDATE `cart_details` SET quantity=$quantities where ip_address='$get_ip_addr'";
        $result_products_quantity= mysqli_query($conn, $update_cart);
        if($result_products_quantity) {
            echo "<script>alert('The query is execute successfully.') </script>";
        }
        else {
            echo "<script>alert('There is a problem.') </script>";
        }
        $total_price = $total_price * $quantities;

}
else {
    echo "<script>alert('unable to entering in to isset.') </script>";
}

?>