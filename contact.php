<?php
   
  include('./header.php');
   
?>


   
        
        <!-- fourth child -->
        <div class="row px-3">
            <div class="col-md-10">
                <h1>Do you want to contact us </h1>
                <h4 class="text-info">give call us on <a  class="text-success text-decoration-none"  href="">11234567890</a></h4> </br>
                <h4 class="text-info">or you can email us on this email <a  class="text-success text-decoration-none"  href="">123test@gmail.com</a></h4>
               

                

            </div>  <! -- column end -->
            <!-- side nav bar column -->
            <div class="col-md-2 bg-secondary p-0">
                <!-- Brands to be displayed -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-dark">
                        <a href="#" class="nav-link "><h4>Brands</h4></a>
                    </li>
                        <?php
                          getBrands();
                        ?>
                </ul>
                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-light text-center">
                    <li class="nav-item bg-dark">
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