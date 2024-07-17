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
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">My Store</h3>
            <p class="text-center">this is awesome ecommerce website</p>
        </div>
        <!-- fourth child -->
        <div class="row px-3">
            <div class="col-md-10">
                <!-- products column -->  
                <div class="row">
                    <! -- fetching products -->
                    
                    <?php
                     
                    //calling cart function
                    cart() ;
                    
                    
                    // calling functions
                    getProducts();
                    
                    getSpecificCategories();
                    getSpecificBrands();
                   
                    
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
         <!-- include footer -->

        <?php

        include('./footer.php');

        ?>






    </div>









  
</body>
</html>