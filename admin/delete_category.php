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
    $connect= $path."/Ecommerce_Website_Copy/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website_Copy/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    //@session_start();
?>

<?php 
 if(isset($_GET['delete_category'])) {
    $delete_id=$_GET['delete_category'];


    $delete_category = "DELETE from `categories` where category_id=$delete_id";
    $result_category = mysqli_query($conn,$delete_category);
    if($result_category) {
       
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
 }

?>