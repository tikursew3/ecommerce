
<?php
   
   include('./header.php');
    
 


    if(isset($_POST['login'])) {

        $username=$_POST['username'];
        $password=$_POST['password'];
        $select_query="SELECT * from `user_table` where
        username='$username'";
        $result=mysqli_query($conn,$select_query);
        $row_data=mysqli_fetch_assoc($result);
        $row_count=mysqli_num_rows($result);
        $user_ip=getIPAddress();

      

        if($row_count > 0) {
            $_SESSION['username']=$username;
          if(password_verify($password, $row_data['password'])) {
            echo "<script>alert('login successful')</script>";
            echo "<script>window.open('./index.php','_self')</script>";

            } else {
                echo "<script>alert('wrong password')</script>";
            }

        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }

    }

   ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <!-- font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- nav bars -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo2.webp" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItem() ?></sup></a>
                        </li>
                        
                        
                    </ul>
                    <form  class="d-flex" action="search.php" method="GET">
                        <input class="form-control me-2" type="search"  placeholder="Search" aria-label="Search" name="search_data" >
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                

                <?php
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
                                    <a href="user_area/registration.php">Register</a></p>

                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>    
</body>
</html>