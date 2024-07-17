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


        <h1>This is place holder for checkout</h1>
        <div class="row px-1">
            <div class="col-mid-12">
                <div class="row">
                    <?php
                        if(!isset($_SESSION['username'])) {
                           // include('user_area/user_login.php');
                           echo "<script>alert('please login first')</script>";
                            //header("Location:user_area/user_login.php");
                            echo "<script>window.open('user_area/user_login.php','_self')</script>";


                        } else {
                            echo "<script>window.open('payment.php','_self')</script>";
                            //include('payment.php');
                          // header("Location:payment.php");
                        }

                    ?>

                </div>
            </div>
        </div>
       



  <!-- last child footer-->
   
       <!-- include footer -->

 <?php
 
 include('./footer.php');
 
 ?>



</div>

      <!-- bootstrap js link --> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>