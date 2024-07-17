


<?php
   
   include('./header.php');
    
 ?>


<?php
  //@session_start();
            //include('includes/connect.php');
            //include('functions/common_function.php');
            global $conn;
            $user_ip = getIPAddress();
            $get_user = "SELECT * from `user_table` where user_ip = '$user_ip'";
            
           // $result = mysqli_query($conn, $get_user);
            $result = mysqli_query($conn, $get_user);
            $run_query = mysqli_fetch_array($result);
            $user_id = $run_query['user_id'];


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
                        <a class='nav-link' href='./user_area/user_login.php'>login</a>
                    </li> ";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./user_area/logout.php'>logout</a>
                    </li>";
                    }

                ?>
                
            </ul>
        </nav>


       

        <!-- php code to access user id -->
       

       <h2 class="text-center text-info"> Payment Option </h2>
      
       <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">

                <a href="https://www.paypal.com" target="_blank"> <img class="form-control" src="./images/paypal-brands.svg " alt="Image" style="width: 500px; height: 500px; display:block; margin:auto" > </a>
            </div>
            <div class="col-md-6">

                <a href="order.php?user_id=<?php echo $user_id ?>"> <h2 class="text-center">Pay Offline</h2> </a>
            </div>
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