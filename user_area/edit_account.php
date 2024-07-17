<?php

    @session_start();

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
   // include($functions);
   


//include($header);





if(isset($_GET['edit_account'])) {
    
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($conn,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);

    $user_id = $row_fetch['user_id'];
    $first_name = $row_fetch['first_name'];
    
    $last_name = $row_fetch['last_name'];
    $user_image = $row_fetch['user_image'];
    $email = $row_fetch['email'];
    $user_address = $row_fetch['user_address'];
    $user_contact = $row_fetch['user_contact'];
    $username = $row_fetch['username'];
}
if(isset($_POST['user_update'])) {
    $update_id = $user_id;
   
    $first_name = $_POST['first_name'];
   
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $username = $_POST['username'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
  

    move_uploaded_file($user_image_temp,"../images/$user_image");
   

  

    //update query
    $update_data = "UPDATE `user_table` set user_id=$update_id,first_name='$first_name',
    last_name='$last_name',user_image='$user_image',email='$email',user_address='$user_address',
    user_contact='$user_contact', username='$username'";
    $result_query_update = mysqli_query($conn,$update_data);
    if($result_query_update) {
        echo " <script>alert('Data updated successfully')</script> ";
        echo " <script>window.open('logout.php','_self')</script> "; 
    }



}
?>


   <h3 class="text-center text-success mb-3">Edit Account</h3>
    
   <form action="" method="POST" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
        <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control w-50 m-auto" name="first_name" value="<?php echo $first_name ?>">
        </div>
        <div class="form-outline mb-4">
        <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control w-50 m-auto" name="last_name" value="<?php echo $last_name ?>">
        </div>
        <div class="form-outline mb-4 d-flex  w-50 m-auto">
        <label for="user_image" class="form-label">Image</label>
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="../images/<?php echo $user_image  ?>" alt="image" class="edit_image">
        </div>
        <div class="form-outline mb-4">
        <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control w-50 m-auto" name="email" value="<?php echo $email ?>">
        </div>
       
        <div class="form-outline mb-4">
        <label for="user_address" class="form-label">Address</label>
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-4">
        <label for="user_contact" class="form-label">Contact</label>
            <input type="text" class="form-control w-50 m-auto" name="user_contact" value="<?php echo $user_contact ?>">
        </div>
        <div class="form-outline mb-4">
        <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $username ?>">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">

   </form>
    


    <!-- bootstrap js link --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>