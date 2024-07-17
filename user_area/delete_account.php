<?php
    //include('../includes/connect.php');
    $username_session = $_SESSION['username'];
    //echo $username_session;
    if(isset($_POST['delete'])) {
        echo " <script>alert('you are going to delete your account')</script> "; 
        $delete_query = "DELETE from `user_table` where username='$username_session'";
        $result_delete = mysqli_query($conn, $delete_query); 
        if($result_delete) {

            session_destroy();
            
            echo " <script>alert('account deleted')</script> "; 
            echo " <script>window.open('../index.php','_self')</script> "; 
        }
    }

    

?>





<h3 class="text-center text-danger mb-4">Delete Account</h3>
<form action="" class="mt-5" method="POST">
    <div class="form-outline">
        <input type="submit" name="delete" value="Delete Account" class="form-control w-50 m-auto bg-danger">
    </div>

   


</form>

    
</body>
</html>