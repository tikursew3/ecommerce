
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
 if(isset($_GET['delete_brands'])) {
    $delete_id=$_GET['delete_brands'];

    
    $delete_brands = "DELETE from `brands` where brand_id=$delete_id";
    
    $result_brands = mysqli_query($conn,$delete_brands);
    if($result_brands) {
        
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
 }

?>