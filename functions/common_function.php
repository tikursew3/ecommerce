<?php
//including connect file
include('./includes/connect.php');


//getting products
function getProducts() {
    global $conn;
    //condition to check isset or not
    if(!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {
           
            $select_query = "Select * from `products` order by rand() limit 0,6";
            $result_query = mysqli_query($conn, $select_query);
            //$row_data = mysqli_fetch_assoc($result_query);
            //echo $row_data['product_title'];
            while($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_image1 = $row_data['product_image1'];
                $product_image2 = $row_data['product_image2'];
                $product_price = $row_data['product_price'];
                $category_id = $row_data['category_id'];
                $brand_id = $row_data['brand_id'];
                echo " <div class='col-md-4 mb-2'>
                            <div class='card' >
                                <img src='./images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'> $product_title</h5>
                                    <p class='card-text'>$product_description </p> 
                                    <p class='card-text'>price: $$product_price </p> 
                                    <a href='index.php?add_to_cart=$product_id' 
                                    class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View more</a>
                                </div>
                            </div> 
                        </div> ";
            }
        }
    }
}
// get all products
function getAllProducts(){
    global $conn;
    //condition to check isset or not
    if(!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {
           
            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($conn, $select_query);
            //$row_data = mysqli_fetch_assoc($result_query);
            //echo $row_data['product_title'];
            while($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_image1 = $row_data['product_image1'];
                $product_image2 = $row_data['product_image2'];
                $product_price = $row_data['product_price'];
                $category_id = $row_data['category_id'];
                $brand_id = $row_data['brand_id'];
                echo " <div class='col-md-4 mb-2'>
                            <div class='card' >
                                <img src='./images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'> $product_title</h5>
                                    <p class='card-text'>$product_description </p> 
                                    <p class='card-text'>price: $$product_price </p> 
                                    <a href='index.php?add_to_cart=$product_id' 
                                    class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View more</a>
                                </div>
                            </div> 
                        </div> ";
            }
        }
    }

}


// displaying specific brands
function getSpecificBrands() {
    global $conn;
    //condition to check isset or not
    if(isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows < 1) {
            echo "<h2> No data for this brand!</h2>";
        }
        //$row_data = mysqli_fetch_assoc($result_query);
        //echo "row_data['product_title']";
        while($row_data = mysqli_fetch_assoc($result_query)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_keywords = $row_data['product_keywords'];
            $product_image1 = $row_data['product_image1'];
            $product_image2 = $row_data['product_image2'];
            $product_price = $row_data['product_price'];
            $category_id = $row_data['category_id'];
            $brand_id = $row_data['brand_id'];
            echo " <div class='col-md-4 mb-2'>
                        <div class='card' >
                            <img src='./images/$product_image1' class='card-img-top' alt=' $product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                                <p class='card-text'>price: $$product_price </p> 
                                <a href='index.php?add_to_cart=$product_id' 
                                    class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-secondary'>View more</a>
                            </div>
                        </div> 
                    </div> ";
        }   
    }
}


//displaying specific categories
function getSpecificCategories() {
    global $conn;
    //condition to check isset or not
    if(isset($_GET['category'])) {
        $category_id = $_GET['category'];
        //where category_id = $category_id
        $select_query = "Select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows < 1) {
            echo "<h2> No data for this category!</h2>";
        }
        //$row_data = mysqli_fetch_assoc($result_query);
        //echo "row_data['product_title']";
        while($row_data = mysqli_fetch_assoc($result_query)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_keywords = $row_data['product_keywords'];
            $product_image1 = $row_data['product_image1'];
            $product_image2 = $row_data['product_image2'];
            $product_price = $row_data['product_price'];
            $category_id = $row_data['category_id'];
            $brand_id = $row_data['brand_id'];
            echo " <div class='col-md-4 mb-2'>
                        <div class='card' >
                            <img src='./images/$product_image1' class='card-img-top' alt=' $product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                                <p class='card-text'>price: $$product_price </p> 
                                <a href='index.php?add_to_cart=$product_id' 
                                class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-secondary'>View more</a>
                            </div>
                        </div> 
                    </div> ";
        }   
    }
}

//displaying brands in sidenav
function getBrands() {
    global $conn;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($conn, $select_brands);
    while ($brands_row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $brands_row_data['brand_title'];
        $brand_id = $brands_row_data['brand_id'];
        echo " <li class='nav-item '>
            <a href='index.php?brand=$brand_id' class='nav-link ''>$brand_title</a>
        </li>";
    }

}
//displaying categories in sidenav
function getCategory() {
    global $conn;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($conn, $select_categories);
    while ($categories_row_data = mysqli_fetch_assoc($result_categories)) {
        $category_id = $categories_row_data['category_id'];
        $category_title = $categories_row_data['category_title'];
        
        echo " <li class='nav-item '>
        <a href='index.php?category=$category_id' class='nav-link '>$category_title</a>
        </li>";
    }

}
function getCart() {
    global $conn;
    $select_cart = "Select * from `cart`";
    $result_cart = mysqli_query($conn, $select_cart);
    while ($categories_row_data = mysqli_fetch_assoc($result_cart)) {
        $category_id = $categories_row_data['category_id'];
        $category_title = $categories_row_data['category_title'];
        
        echo " <li class='nav-item '>
        <a href='index.php?category=$category_id' class='nav-link '>$category_title</a>
        </li>";
    }

}
//cart function
function cart() {
    if(isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_address = getIPAddress();  
        $getProductId=$_GET['add_to_cart'];
        $select_query="SELECT * from `cart_details` where ip_address='$get_ip_address'
        and product_id=$getProductId";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows > 0) {
            echo "<script>alert('The product is already present inside the cart') </script>";
            echo"<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query="INSERT into `cart_details` (product_id, ip_address, quantity) 
            values ($getProductId, '$get_ip_address', 1) ";
             $result_query = mysqli_query($conn, $insert_query);
             echo "<script>alert('The product is added to the cart') </script>";
             echo"<script>window.open('index.php', '_self')</script>";
        }


      
    }
    
}
// function to get the number of cart item 
function cartItem() {
    if(isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_address = getIPAddress();  
        
        $select_query="SELECT * from `cart_details` where ip_address='$get_ip_address'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_cart_items = mysqli_num_rows($result_query);
       
        } else {
            global $conn;
            $get_ip_address = getIPAddress();  
            
            $select_query="SELECT * from `cart_details` where ip_address='$get_ip_address'";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_cart_items = mysqli_num_rows($result_query);
         
        }
        echo $num_of_cart_items;
    
}
//function to get the total price
function totalCartPrice() {
    global $conn;
    $get_ip = getIPAddress();
    $total_price = 0;
    $sql_query="SELECT * from `cart_details` where ip_address='$get_ip'";
    $result = mysqli_query($conn, $sql_query);
    while($data = mysqli_fetch_array($result)) {
        $product_id = $data['product_id'];
        $select_products_query = "SELECT * from `products` where product_id=$product_id ";
        $result_products= mysqli_query($conn, $select_products_query);
        while($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

function searchProduct() {
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query = "SELECT * from `products` where product_keywords 
        like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
            
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0) {
            echo "<h2>  No data for this product!</h2>";
        }

            while($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_image1 = $row_data['product_image1'];
                $product_image2 = $row_data['product_image2'];
                $product_price = $row_data['product_price'];
                $category_id = $row_data['category_id'];
                $brand_id = $row_data['brand_id'];
                echo " <div class='col-md-4 mb-2'>
                            <div class='card' >
                                <img src='./images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'> $product_title</h5>
                                    <p class='card-text'>$product_description </p> 
                                    <p class='card-text'>price: $$product_price </p> 
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View more</a>
                                </div>
                            </div> 
                        </div> ";
            }
    }
}

//get user order details
function get_user_order_details() {
    global $conn;
    $username = $_SESSION['username'];
    $get_details = "SELECT * from `user_table` where username='$username'";
    $result_query = mysqli_query($conn,$get_details);
    while($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])) {
            if(!isset($_GET['my_orders'])) {
                if(!isset($_GET['delete_account'])) { 
                    $get_orders = "SELECT * from `user_orders` where user_id=$user_id 
                    and order_status='pending'";
                    $result_orders_query = mysqli_query($conn, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count > 0) {
                      
                        echo " <h3 class='text-center text-success my-5'> You have <span class='text-danger '>$row_count</span> pending orders </h3> 
                        <p class='text-center'><a href='profile.php?my_orders' class='text-secondary'>Order Details</a></P>";
                    } else {
                        echo "  <h3 class='text-center text-success my-5'> You have 0 pending orders </h3> 
                        
                        <p class='text-center'><a href='../index.php' class='text-secondary'>look at products</a></P>";
                    }
                }
            }
        }
    }
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  





?>