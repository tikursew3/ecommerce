
<?php
    @session_start();
    $local = true;

    $docRoot = "http://" . $_SERVER['HTTP_HOST'];
    if ($local == false) {
        $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2207/";
    }

    $path = $_SERVER['DOCUMENT_ROOT']; 
    if($local == false) {
        $path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];  
    }
    $header= $path."/Ecommerce_Website_Copy/user_area/header.php"; 
    $connect= $path."/Ecommerce_Website_Copy/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website_Copy/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    
    include($header);
    
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
                        <a class='nav-link text-light' href='./user_login.php'>login</a>
                    </li> ";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./logout.php'>logout</a>
                    </li>";
                    }

                ?>


                
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">My Store</h3>
            <p class="text-center">this is awesome ecommerce website</p>
        </div>


<!-- fourth child -->
<div class="row ">
    <div class="col-md-2 ">
        <ul class="navbar-nav bg-secondary text-center " style="height: 100vh" >
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light "><h4>My profile</h4> </a>
            </li>
            <?php 
            $username=$_SESSION['username'];
            $user_image_query="SELECT * from `user_table` where username='$username'";
            $result_image = mysqli_query($conn, $user_image_query);
            $row_image = mysqli_fetch_array($result_image);
            $user_image = $row_image['user_image'];
            echo "  <li class='nav-item '>
            <img class='profile_image my-3' src='../images/$user_image' alt='Profile image' 
            style='width: 100%; margin: auto; display: block; object-fit: contain;'>
                </li> ";
            
            ?>


           

            <li class="nav-item ">
                <a href="profile.php" class="nav-link text-light ">Pending Order </a>
            </li>

            <li class="nav-item ">
                <a href="profile.php?edit_account" class="nav-link text-light ">Edit Account </a>
            </li>

            <li class="nav-item ">
                <a href="profile.php?my_orders" class="nav-link text-light ">My Orders </a>
            </li>

            <li class="nav-item ">
                <a href="profile.php?delete_account" class="nav-link text-light ">Delete Account</a>
            </li>
            <li class="nav-item ">
                <a href="logout.php" class="nav-link text-light ">Logout</a>
            </li>
        </ul>        
    </div>
    <div class="col-md-10 ">
        <?php get_user_order_details();
        if(isset($_GET['edit_account'])) {
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])) {
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])) {
            include('delete_account.php');
        }
        ?>
    </div>
    
   
   
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>