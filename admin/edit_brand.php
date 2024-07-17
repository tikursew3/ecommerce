<?php


include('../includes/connect.php');
include('../functions/common_function.php');




if (isset($_GET['edit_brands'])) {

    $edit_id = $_GET['edit_brands'];
    //echo $edit_id;
    $get_data = "SELECT * from `brands` where brand_id=$edit_id";
    $result_data = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($result_data);
    $brand_id = $row['brand_id'];
    $brand_title = $row['brand_title'];
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit brand</title>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Edit brand</h1>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-outline w-50 m-auto mb-4">
                <label for="brand_title" class="form-label">brand Title</label>
                <input type="text" id="brand_title" value="<?php echo $brand_title; ?>" name="brand_title" class="form-control " required="required">
            </div>

            <div class="w-50 m-auto">
                <input type="submit" name="edit_brands" value="Update_brand" class="btn btn-info mb-3 px-3 ">
            </div>

        </form>
    </div>

</body>

</html>



<?php

if (isset($_POST['edit_brands'])) {

    $brand_title = $_POST['brand_title'];
    $update_brand = "UPDATE `brands` SET brand_title='$brand_title' where brand_id=$edit_id";
    $result_update_brand = mysqli_query($conn, $update_brand);
    if ($result_update_brand) {
        echo "<script>alert('brand updated successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('brand not updated ')</script>";
    }
}


?>