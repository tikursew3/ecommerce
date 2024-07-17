

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
   // $functions= $path."/Ecommerce_Website/functions/common_function.php"; 
   
    include($connect);
    //include($functions);
   // @session_start();
?>

<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();
    if(isset($_POST['admin_login'])) {

        $admin_username=$_POST['admin_username'];
        $password=$_POST['password'];
        $select_query="SELECT * from `admin_table` where
        admin_username='$admin_username'";
        $result=mysqli_query($conn,$select_query);
        $row_data=mysqli_fetch_assoc($result);
        $row_count=mysqli_num_rows($result);
        $admin_ip=getIPAddress();

        if($row_count > 0) {
            $_SESSION['admin_username']=$admin_username;
          if(password_verify($password, $row_data['password'])) {
           
            $_SESSION['admin_username']=$admin_username;
            echo "<script>alert('login successful')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
            
         
          } else {
            echo "<script>alert('wrong password')</script>";
          }
           //header("Location:payment.php");
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
    <title>Admin Login</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <!-- font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />


   <!-- bootstrap js link --> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">

   

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>

        <div class="row d-flex justify-content-center align-items-center m-3">
            <div class="col-md-6">
                <img src="../images/earth.jpeg" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-md-6 ">
                <form action="" method="POST" class="">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" name="admin_username" id="admin_username" class="form-control"
                        placeholder="Enter your admin username" require="required">
                    </div>
                   
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter your Password" require="required">
                    </div>

                    <div class="form-outline mb-4">
                        
                        <input type="submit" name="admin_login" class="bg-info py-2 px-3
                        border-0" value="Login">
                        <p class="small">Don't' you have an account?
                          <a href="admin_registration.php" class="link-danger">Register</a>  
                        </p>
                    </div>
                </form>
               
            </div>

        </div>
    </div>


    
</body>
</html>