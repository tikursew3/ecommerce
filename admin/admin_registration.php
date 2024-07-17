
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
    //$header= $path."/Ecommerce_Website/user_area/header.php"; 
    $connect= $path."/Ecommerce_Website/includes/connect.php"; 
    //$functions= $path."/Ecommerce_Website/functions/common_function.php"; 
   
    include($connect);
    //include($functions);
   // @session_start();
?>


<?php
    //include('connect.php');
   
   
   // include('../functions/common_function.php');
   // @session_start();

    if(isset($_POST['admin_registration'])) {
        global $conn;
       $first_name = $_POST['first_name']; 
       $last_name = $_POST['last_name']; 
       $admin_image = $_FILES['admin_image']['name'];
       $admin_image_temp = $_FILES['admin_image']['tpm_name'];
       $email = $_POST['email']; 
       $admin_username = $_POST['admin_username']; 
       $password = $_POST['password']; 
       $hash_password = password_hash($password, PASSWORD_DEFAULT);
       $confirm_password = $_POST['confirm_password']; 
       $admin_ip = getIPAddress();

       /*
       $select_query = "SELECT * from `user_table` where username=$username";
       $result_query = mysqli_query($conn,$select_query);
       $row_count = mysqli_num_rows($result_query);
       if($row_count > 0) {
        echo "<script> alert('Username or Email has already taken'); </script>";
       }
       */

       move_uploaded_file($admin_image_temp,"./images/$admin_image");
      
       $sql_query = "SELECT * FROM `admin_table` WHERE email = '$email' or admin_username = '$admin_username' ";
        $result_select = mysqli_query($conn,$sql_query);

        $row = mysqli_num_rows($result_select);

        if($row > 0) {
           
            echo "<script> alert('Username or Email has already taken'); </script>";
        
        }
        else {
            if ($password == $confirm_password) {
                $query = "INSERT INTO `admin_table`(first_name,last_name,admin_image,email,admin_username,password,admin_ip) 
                values('$first_name', '$last_name', '$admin_image', '$email', '$admin_username',  '$hash_password', '$admin_ip')";
                $result_insert = mysqli_query($conn,$query);
                 
                if($result_insert) {
                    echo "<script> alert('Admin Registeration Successfull'); </script>";
                }

            } else {
                echo "<script> alert('Password doesn't match'); </script>";
            }
             
        }
    }
?>
















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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

    <!-- css file 
    <link rel="stylesheet" href="style.css">-->

    <style>
        body{
            overflow: hidden;
        }
    </style>

</head>
<body>


    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>

        <div class="row d-flex justify-content-center align-items-center m-3">
            <div class="col-md-6">
                <img src="../images/earth.jpeg" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-md-6 ">
                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" 
                        class="form-control" placeholder="Enter your First Name" 
                        required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" 
                        class="form-control" placeholder="Enter your Last Name" 
                        required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">Image</label>
                        <input type="file" name="admin_image" id="admin_image" 
                        class="form-control" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                        placeholder="Enter your Email" require="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" name="admin_username" id="admin_username" class="form-control"
                        placeholder="Enter your admin username" required="required">
                    </div>
                   
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter your Password" require="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        placeholder="Confirm your Password" require="required">
                    </div>

                    <div class="form-outline mb-4">
                        
                        <input type="submit" name="admin_registration"  class="bg-info py-2 px-3
                        border-0" value="Register">
                        <p class="small">Do you have an account?
                          <a href="admin_login.php" class="link-danger">Login</a>  
                        </p>
                    </div>
                </form>
               
            </div>

        </div>
    </div>


    
</body>
</html>