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
    $header= $path."/Ecommerce_Website_Copy/user_area/header.php"; 
    $connect= $path."/Ecommerce_Website_Copy/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website_Copy/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    
    include($header);
    @session_start();



    if(isset($_POST['user_register'])) {
        global $conn;
       $first_name = $_POST['first_name']; 
       $last_name = $_POST['last_name']; 
       $user_image = $_FILES['user_image']['name'];
       $user_image_temp = $_FILES['user_image']['tpm_name'];
       $email = $_POST['email']; 
       $user_address = $_POST['user_address']; 
       $user_contact = $_POST['user_contact']; 
       $username = $_POST['username']; 
       $password = $_POST['password']; 
       $hash_password = password_hash($password, PASSWORD_DEFAULT);
       $confirm_password = $_POST['confirm_password']; 
       $user_ip = getIPAddress();

       /*
       $select_query = "SELECT * from `user_table` where username=$username";
       $result_query = mysqli_query($conn,$select_query);
       $row_count = mysqli_num_rows($result_query);
       if($row_count > 0) {
        echo "<script> alert('Username or Email has already taken'); </script>";
       }
       */

       move_uploaded_file($user_image_temp,"./images/$user_image");
      
       $sql_query = "SELECT * FROM `user_table` WHERE email = '$email' or username = '$username' ";
        $result_select = mysqli_query($conn,$sql_query);

        $row = mysqli_num_rows($result_select);

        if($row > 0) {
           
            echo "<script> alert('Username or Email has already taken'); </script>";
        
        }
        else {
            if ($password == $confirm_password) {
                $query = "INSERT INTO `user_table`(first_name,last_name,user_image,email,user_address,user_contact, username,password,user_ip) 
                values('$first_name', '$last_name', '$user_image', '$email', '$user_address', '$user_contact','$username',  '$hash_password', '$user_ip')";
                $result_insert = mysqli_query($conn,$query);
                 
                if($result_insert) {
                    echo "<script> alert('User Registeration Successfull'); </script>";
                    echo "<script> window.open('./user_login.php'); </script>";
                }

            } else {
                echo "<script> alert('Password doesn't match'); </script>";
            }
             
        }
    }
?>



   <div class="container-fluid my-3">
        <h2 class="text-center">New User Registeration</h2>
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <form action="" class="" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-outline">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" 
                        class="form-control" placeholder="Enter your First Name" 
                        required="required">
                    </div>
                    <div class="form-outline">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" 
                        class="form-control" placeholder="Enter your Last Name" 
                        required="required">
                    </div>
                    <div class="form-outline">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" name="user_image" id="user_image" 
                        class="form-control" required="required">
                    </div>
                   
                    <div class="form-outline">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" 
                        class="form-control" placeholder="Enter your Email" 
                        required="required">
                    </div>
                    <div class="form-outline">
                        <label for="user_address" class="form-label"> Address</label>
                        <input type="text" name="user_address" id="user_address" 
                        class="form-control" placeholder="Enter your Address" 
                        required="required">
                    </div>
                    <div class="form-outline">
                        <label for="user_contact" class="form-label"> Contact</label>
                        <input type="text" name="user_contact" id="user_contact" 
                        class="form-control" placeholder="Enter your Contact" 
                        required="required">
                    </div>
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
                    <div class="form-outline">
                        <label for="confirm_password" class="form-label">Confirm Password </label>
                        <input type="password" name="confirm_password" id="confirm_password" 
                        class="form-control" placeholder="Confirm your Password" 
                        required="required">
                    </div>
                    <div class="mt-4 pt-2">
                         <input type="submit" name="user_register" id="user_register" 
                        class="bg-info py-2 px-3 border-0" value="Register">

                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
                            <a href="user_login.php">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
   </div>

   
     
</body>
</html>