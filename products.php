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
                        <a class='nav-link text-light' href='./user_area/user_login.php'>login</a>
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
       <div class="row p-1">
            <div class="col-md-10 p-3">
                <!-- products column -->  
                <div class="row">
                    <! -- fetching products -->
                    
                    <?php
                     //calling cart function
                     cart() ;
                    // calling functions
                    getAllProducts();
                    
                    
                    ?>
                </div>  <! -- row end -->             
            </div>  <! -- column end -->
            <!-- side nav bar column -->
            <div class="col-md-2 bg-secondary p-0">
                <!-- Brands to be displayed -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link "><h4>Brands</h4></a>
                    </li>
                        <?php
                          getBrands();
                        ?>
                </ul>
                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link "><h4>Category</h4></a>
                    </li>
                    <?php
                        getCategory();
                        ?>   
                </ul>
            </div>
        </div>

        <!-- last child footer-->
        <div class="bg-info p-2 text-center footer w-100 position-relative">
            <p>All rights reserved @- Designed by Menelik Tawye</p>

        </div>


    </div>

      <!-- bootstrap js link --> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>