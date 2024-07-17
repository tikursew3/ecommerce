

<?php
   
   include('./header.php');
    
 ?>


<?php

    
   // @session_start();

    if(isset($_GET['user_id'])) {
        
        $user_id = $_GET['user_id'];
    }
//getting total items and total price of all items.
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * from `cart_details` where ip_address='$get_ip_address'";

$result_cart_price = mysqli_query($conn, $cart_query_price);
$invoice_number = mt_rand();

$status = 'pending';


$count_products = mysqli_num_rows($result_cart_price);

while($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
   
    $select_product = "SELECT * from `products` where product_id=$product_id";
    $run_price = mysqli_query($conn, $select_product);
   

   
    while($row_products_price = mysqli_fetch_array($run_price)) {
        $product_price = array($row_products_price['product_price']);
        
        $product_values = array_sum($product_price);
      
        $total_price += $product_values;
       


    }


// getting quantity from cart

$get_cart = "SELECT * from `cart_details`";
$run_cart= mysqli_query($conn, $get_cart);


$get_item_quantity = mysqli_fetch_array($run_cart);

$quantity = $get_item_quantity['quantity'];


if($quantity == 0) {
    $quantity = 1;
   
    $subtotal = $total_price;
  
} else {
    $quantity = $quantity;
   
    $subtotal = $total_price * $quantity;
   // echo  $subtotal;

}
$insert_orders = "INSERT into `user_orders`(user_id,amount_due,invoice_number,total_products,order_date,order_status)
                values ($user_id,$subtotal,$invoice_number,$quantity,NOW(),'$status')";
$result_orders = mysqli_query($conn, $insert_orders);

if($result_orders) {
    echo "<script>alert('Orders are inserted ')</script>";
    echo "<script>window.open('./user_area/profile.php','_self')</script>";
}          


//orders pending
$insert_pending_orders = "INSERT into `orders_pending`(user_id,invoice_number,product_id,quantity,order_status)
                values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders = mysqli_query($conn, $insert_pending_orders);
$total_price = 0;

}

//delete items from cart

$delete_cart_query = "Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete_cart = mysqli_query($conn,$delete_cart_query);


    
?>













