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
    $header= $path."/Ecommerce_Website/includes/header.php"; 
    $connect= $path."/Ecommerce_Website/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    @session_start();
?>
<?php

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

        <div class="container-fluid my-3">
                <h2 class="text-center">User Login</h2>
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <form action="" class="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            
                            <div class="form-outline">
                                <label for="username" class="form-label"> Username</label>
                                <input type="text" name="username" id="username" 
                                class="form-control" placeholder="Enter your Username" 
                                required="required">
                            </div>
                            
                            <div class="form-outline">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" 
                                class="form-control" placeholder="Enter your Password" 
                                required="required">
                            </div>
                            
                            <div class="mt-4 pt-2">
                            
                                <input type="submit" value="Login" name="login" id="login" 
                                class="bg-info py-2 px-3 border-0">
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                    <a href="registration.php">Register</a></p>

                            </div>
                        </form>
                    </div>
                </div>
        </div>
  

    </div>
   
     
    </body>
</html>