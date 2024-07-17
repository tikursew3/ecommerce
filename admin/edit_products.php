<?php


include('../includes/connect.php');
include('../functions/common_function.php');



if (isset($_GET['edit_products'])) {

    $edit_id = $_GET['edit_products'];
    //echo $edit_id;
    $get_data = "SELECT * from `products` where product_id=$edit_id";
    $result_data = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($result_data);

    $product_title = $row['product_title'];
    //echo $product_title;
    $product_description = $row['product_description'];

    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
    // echo $product_keywords;



    //fetching category name
    $select_category = "SELECT * from `categories` where category_id=$category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];


    //fetching brands name
    $select_brand = "SELECT * from `brands` where brand_id=$brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Edit Products</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title; ?>" name="product_title" class="form-control " required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" value="<?php echo $product_description; ?>" name="product_description" class="form-control " required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" value="<?php echo $product_keywords; ?>" name="product_keywords" class="form-control " required="required">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                    <?php
                    $select_all_category = "SELECT * from `categories`";
                    $result_category_all = mysqli_query($conn, $select_all_category);
                    while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "  <option value='$category_id'>$category_title</option> ";
                    }

                    ?>


                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brands" class="form-label">Product Brands</label>
                <select name="product_brands" id="" class="form-select">
                    <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                    <?php
                    $select_all_brand = "SELECT * from `brands`";
                    $result_brand_all = mysqli_query($conn, $select_all_brand);
                    while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                        $brand_title = $row_brand_all['brand_title'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo "  <option value='$brand_id'>$brand_title</option> ";
                    }

                    ?>
                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto " required="required">
                    <img src="../images/<?php echo $product_image1 ?>" alt="image" class="product_img">

                </div>

            </div>


            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto " required="required">
                    <img src="../images/<?php echo $product_image2 ?>" alt="image" class="product_img">

                </div>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo $product_price; ?>" name="product_price" class="form-control " required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_products" value="Update_product" class="btn btn-info mb-3 px-3 ">
            </div>

        </form>
    </div>

</body>

</html>



<?php

if (isset($_POST['edit_products'])) {
    //echo "true";
    $product_title_post = $_POST['product_title'];
    $product_description_post  = $_POST['product_description'];
    $product_keywords_post  = $_POST['product_keywords'];
    $product_category_post  = $_POST['product_category'];
    echo $product_category_post;
    $product_brands_post  = $_POST['product_brands'];
    echo $product_brands_post;
    $product_price_post  = $_POST['product_price'];
    // echo $product_price_post;
    $product_image1_post  = $_FILES['product_image1']['name'];
    $product_image2_post  = $_FILES['product_image2']['name'];

    $temp_image1  = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    //checking fields
    /*
     if($product_title == '' or $product_description == '' or $product_keywords == ''
     or $product_category == '' or $product_brands =='' or $product_price == ''
     or $product_image1 =='' or $product_image2 =='') {
         echo "<script>alert('please fill all fields')</script>";
     } else { }
     */


    move_uploaded_file('$temp_image1', "../images/$product_image1");
    move_uploaded_file('$temp_image2', "../images/$product_image2");


    $update_products_post = "UPDATE `products` SET product_title='$product_title_post',
         product_description='$product_description_post', product_keywords='$product_keywords_post',
         category_id=$product_category_post,brand_id=$product_brands_post,
         product_image1='$product_image1_post',product_image2='$product_image2_post',
         product_price=$product_price_post,date=NOW() where product_id=$edit_id";


    //echo $edit_id;  
    // echo $product_category_post;

    $result_update_product = mysqli_query($conn, $update_products_post);
    //echo $edit_id;  

    if ($result_update_product) {
        echo "<script>alert('product updated successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('product not updated ')</script>";
    }
}


?>