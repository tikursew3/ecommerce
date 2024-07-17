

<?php
    $local = true;

    $docRoot = "http://" . $_SERVER['HTTP_HOST'];
    if ($local == false) {
        $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2207/";
    }

    $path = $_SERVER['DOCUMENT_ROOT']; 
    if($local == false) {
        $path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];  
    }
   // $header= $path."/Ecommerce_Website/user_area/header.php"; 
    $connect= $path."/Ecommerce_Website/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    @session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- font awesome  link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- css file -->
     <link rel="stylesheet" href="../style.css">

     <style>
        body {
            overflow-x: hidden;
        }
        .product_img {
        width: 50px; 
        height: 50px; 
        object-fit: contain;

}
    </style>


</head>
<body>
    <!-- nav bar --> 
    <div class="container-fluid p-0">
      
         <!-- second child --> 
         <div class="bg-light">
            <h3 class="bg-info text-center p-2">Manage Details</h3>
         </div>
          <!-- third child --> 
          <div class="row">
            <div class="col-md-12 bg-secondary p-1 align-items-center">
               
                <div class="button text-center">
                
                    <button> <a class="nav-link text-light bg-info my-1"  href="../index.php">Home</a></button>
                       
                    <button><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">insert product</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">view product</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
                    <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">view category</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">insert brand</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">view brand</a></button>
                    <button><a href="index.php?all_orders" class="nav-link text-light bg-info my-1">all orders</a></button>
                    <button><a href="index.php?all_payments" class="nav-link text-light bg-info my-1">all payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">list users</a></button>


                    <?php
                    if(isset($_SESSION['admin_username'])) {
                        echo "<button> <a class='nav-link text-light bg-info my-1' href='./admin_logout.php'>Logout</a> </button>";
                    } 

                ?>

   
                </div>

            </div>
          </div>
           <!-- fourth child footer-->
            <div class="container my-3">
                <?php
                if(isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                } 
                if(isset($_GET['insert_brand'])) {
                    include('insert_brands.php');
                } 
                if(isset($_GET['insert_product'])) {
                    include('insert_product.php');
                }
                if(isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if(isset($_GET['view_category'])) {
                    include('view_category.php');
                }
                if(isset($_GET['view_brand'])) {
                    include('view_brand.php');
                }
                if(isset($_GET['all_orders'])) {
                    include('all_orders.php');
                }
                if(isset($_GET['all_payments'])) {
                    include('all_payments.php');
                }
                if(isset($_GET['list_users'])) {
                    include('list_users.php');
                }
                if(isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])) {
                    include('delete_product.php');
                }
                if(isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])) {
                    include('edit_brand.php');
                }
                if(isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])) {
                    include('delete_brands.php');
                }
                if(isset($_GET['delete_users'])) {
                    include('delete_users.php');
                }
                if(isset($_GET['delete_orders'])) {
                    include('delete_orders.php');
                }
                if(isset($_GET['delete_payments'])) {
                    include('delete_payments.php');
                }


                ?>
                </br>
                </br>
                </br>
                </br>
            </div>
          <!-- last child footer-->
       <!-- include footer -->
       <?php

$local = true;
/*       
$docRoot = "http://" . $_SERVER['HTTP_HOST'];
if ($local == false) {
    $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2207/";
}
*/
$path = $_SERVER['DOCUMENT_ROOT']; 
if($local == false) {
    $path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];  
}



//$path = $_SERVER['DOCUMENT_ROOT']; 
$footer= $path."/Ecommerce_Website/includes/footer.php";  
include($footer);

?>


    </div>

    <!-- bootstrap js link --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
    crossorigin="anonymous"></script>
</body>
</html>