<?php
   
  include('./header.php');
   
?>


          <!-- second child -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
              

                <?php
                  
                  if(!isset($_SESSION['username'])) {
                      echo "<li class='nav-item'>
                      <a class='nav-link text-light' href='#'>Welcome Guest</a>
                  </li> ";
                  } else {
                      echo "<li class='nav-item'>
                      <a class='nav-link text-light' href='#'>Welcome ". $_SESSION['username']. "</a>
                  </li>";
                  }




                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./user_login1.php'>login</a>
                    </li> ";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./user_area/logout.php'>logout</a>
                    </li>";
                    }

                ?>


                
            </ul>
        </nav>
      
       
      
        
        <!-- fourth child -->
      <div class="container">
        <div class="row">
            <form action="" method="POST">
            <table class="table table-bordered m-5">
               
                        <!-- php code to display dynamic data -->
                        <?php
                        //include('includes/connect.php');
                            global $conn;
                            $get_ip_address = getIPAddress();
                            $total_price = 0;
                            $sql_query="SELECT * from `cart_details` where ip_address='$get_ip_address'";
                            $result = mysqli_query($conn, $sql_query);
                            $result_count = mysqli_num_rows($result);
                            if($result_count > 0 ) {
                                echo " <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Sub total</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operation</th>
                                </tr>
                                <tbody> ";
                            while($row_data = mysqli_fetch_array($result)) {
                                
                            
                                $sub_total = 0;
                                $quantity = 0;

                                $product_id = $row_data['product_id'];
                                $select_products_query = "SELECT * from `products` where product_id='$product_id'";
                                $result_products= mysqli_query($conn, $select_products_query);
                                while($row_product_price = mysqli_fetch_array($result_products)) {
                                    //$price_table = array($row_product_price['product_price']);

                                    $quantity += 1;

                                  

                                    $product_price = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image = $row_product_price['product_image1'];
                                   // $product_values = array_sum($price_table);
                                    $sub_total = $product_price * $quantity;
                                    $total_price += $sub_total;

                   
                        ?>






                  
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img class="cart_img" src="./images/<?php echo $product_image ?>" alt="image" style="width: 50px; height: 50px; object-fit:contain"></td>


                            <?php
                       
                       if(isset($_POST['update_cart'])) {
                       // $sub_total = 0;
                        $quan = $_POST['quantity'];
                        $quantity = $quan;
                        $sql_query="UPDATE `cart_details` SET quantity = $quan where product_id='$product_id'";
                        $result1 = mysqli_query($conn, $sql_query);
                        $sub_total = $product_price * $quan;
                        $total_price += $sub_total;

                       }

                        ?>

                            <td><input type="text" name="quantity" class="form-input w-50" value="<?php echo $quantity ?>"></td>
                          
                            <td><?php echo $product_price ?></td>
                            <td><?php echo $sub_total ?></td>
                            <td><input type="checkbox" name="removeitems[]" value="<?php echo $product_id ?>" class=""></td>
                            <td> 
                                <!-- <button class="bg-info px-2 border-0 mx-2 text-light">Update</button> -->
                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                name="update_cart">



                               <!--  <button class="bg-info px-2 border-0 mx-2 text-light">Remove</button>  -->
                                 <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                name="remove_cart">
                            </td>
                        </tr>

                       

                        <?php
                         }
                         
                        } 
                    } else {
                        echo "<h2 class='text-center'> Cart is Empty </h2>";

                    } 
                            
                        ?>
                          
                    </tbody>
                </thead>
               
            </table>
            <div class="d-flex mb-5">
            <?php
                       
                            
                            $get_ip_address = getIPAddress();
                            //$total_price = 0;
                            $sql_query="SELECT * from `cart_details` where ip_address='$get_ip_address'";
                            $result = mysqli_query($conn, $sql_query);
                            $result_count = mysqli_num_rows($result);
                            if($result_count > 0 ) {
                                echo " <h4 class='px-3'>total price: <strong class='text-info'> $total_price </strong></h4>

                                <button class='bg-info px-3 border-0 mx-3 '> <a href = 'index.php'
                                class='text-light text-decoration-none' >Continue Shopping</a> </button>

                                <button class='bg-secondary px-3 border-0 mx-3'><a href='checkout.php' 
                                class='text-light text-decoration-none' >Checkout</a></button> ";

                            } else {
                                echo " <button class='bg-info px-3 border-0 mx-3 text-light'> <a href = 'index.php'> 
                                Continue Shopping</a> </button>";
                            }



                
               
                            ?>
            </div>
          
         
            </form>
           
           <!-- function to remove cart item -->
           <?php
           function remove_cart_item() {
            global $conn;
            if(isset($_POST['remove_cart'])) {
                foreach($_POST['removeitems'] as $remove_id) {
                    echo$remove_id;
                  
                    $delete_query = "DELETE from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($conn,$delete_query);
                    if($run_delete) {
                        echo "<script>window.open('cart.php',' _self')</script>";

                    }

                }
            }
           }
           echo $remove_item = remove_cart_item();



?>

          
           
        </div>
      </div>
     
     
        <!-- last child footer-->
        <!-- include footer-->

 <?php
 
 include('./footer.php');
 
 ?>






    </div>

      <!-- bootstrap js link --> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>






