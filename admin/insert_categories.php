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
    //include($functions);
    //@session_start();

if(isset($_POST['insert_category'])) {
    $category_title = $_POST['cat_title'];
    //select data from the database
    $select_query = "Select * from `categories` where category_title = '$category_title'";
    $select_result_query = mysqli_query($conn, $select_query);
    $number_of_row = mysqli_num_rows($select_result_query);
    if($number_of_row > 0) {
        echo "<script>alert('This category is already present in the database!')</script>";
    }
    else {
        $insert_query = "insert into `categories`(category_title) values('$category_title')";
        $insert_result_query = mysqli_query($conn, $insert_query);
        if($insert_result_query) {
            echo "<script>alert('category has been inserted successfully')</script>";
        }
        else {
            echo "<script>alert('not successful')</script>";
        }
    }
   
}
?>

<h2 class="text-center">Insert Category</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="insert categories" 
        aria-label="Categories" aria-describedby="basic-addon1">
        
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!--  -->
       <input type="submit" class="bg-info border-0 p-2 my-3" 
        name="insert_category" value="insert category"> 
        <br/>
       

       <!-- <button class="bg-info p-3 border-0 my-3">insert cagegories</button> -->
    </div>
     
</form>