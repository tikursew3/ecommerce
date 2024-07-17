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
    //$functions= $path."/Ecommerce_Website/functions/common_function.php"; 
   
    include($connect);
    //include($functions);
   // @session_start();





if(isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_Keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    //temp name of images
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    if($product_title == '' or $product_description == '' 
        or $product_keywords == '' or $product_category == '' or 
        $product_brand == '' or $product_price == '' or
        $product_image1 == '' or $product_image2 == '') {
            echo "<script>alert('please fill out the available fields')</script>";
            exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        //insert Query
        $insert_product = "insert into `products` (product_title, product_description, 
        product_keywords, category_id, brand_id, product_image1, product_image2, 
        product_price, date, status) values('$product_title', '$product_description',
        '$product_keywords', '$product_category', '$product_brand', 
        '$product_image1', ' $product_image2 ', '$product_price ', NOW(),  '$product_status')";
        $result_query = mysqli_query($conn, $insert_product);
        if($result_query) {
            echo "<script>alert('product inserted')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
}

?>



    <div class="container mt-3">
        <h2 class="text-center">Insert Product</h2>
        <!--form -->
        <!-- enctype="multipart/form-data" helps to insert the images -->
   
        <form action="" class="mb-2 " method="POST" enctype="multipart/form-data">
             <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_title" class="form-label">
                    Product title
                </label>
                <!-- the value of 'for' inside the label and the value 
                of 'id' inside the input should be similar  -->
                <input type="text" class="form-control" placeholder="inter product title" 
                autocomplete="off" name="product_title" id="product_title" required="required">
            </div>
              <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_description" class="form-label">
                    Product description
                </label>
                <!-- the value of 'for' inside the label and the value 
                of 'id' inside the input should be similar  -->
                <input type="text" class="form-control" placeholder="inter product description" 
                autocomplete="off" name="product_description" id="product_description" required="required">
            </div>
            <!-- Keyword -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_Keyword" class="form-label">
                    Product Keyword
                </label>
                <!-- the value of 'for' inside the label and the value 
                of 'id' inside the input should be similar  -->
                <input type="text" class="form-control" placeholder="inter product Keyword" 
                autocomplete="off" name="product_Keyword" id="product_Keyword" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                
                <select name="product_category" id="" class="product_category">
                    <option value="" class="">Select Category</option>
                    <?php
                        $select_query = "Select * from `categories`";
                        $result_query = mysqli_query($conn, $select_query);
                        while ($row_data = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row_data['category_title'];
                            $category_id = $row_data['category_id'];
                           echo "<option value='$category_id'>$category_title</option> ";
                        }

                    ?>
                
                </select>

        
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">     
                <select name="product_brand" id="" class="product_brand">
                    <option value="" class="">Select Brand</option>
                    <?php
                        $select_query = "Select * from `brands`";
                        $result_query = mysqli_query($conn, $select_query);
                        while ($row_data = mysqli_fetch_assoc($result_query)) {
                            $brand_title = $row_data['brand_title'];
                            $brand_id = $row_data['brand_id'];
                           echo "<option value='$brand_id'>$brand_title</option> ";
                        }

                    ?>
                </select>
            </div>
            <!-- Image1 -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_image1" class="form-label">Product image 1 </label>
                <input type="file" class="form-control" name="product_image1" 
                id="product_image1" required="required">
            </div>
             <!-- Image2 -->
             <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_image2" class="form-label">Product image 2 </label>
                <input type="file" class="form-control" name="product_image2" 
                id="product_image2" required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
                <label for="product_price" class="form-label">
                    Product price
                </label>
                <!-- the value of 'for' inside the label and the value 
                of 'id' inside the input should be similar  -->
                <input type="text" class="form-control" placeholder="inter product price" 
                autocomplete="off" name="product_price" id="product_price" required="required">
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto my-3 p-2">
               <input type="submit" class="btn btn-info mb-3 px-3"
                name="insert_product" value="Insert Product">
            </div>

        </form>
    </div>
    
