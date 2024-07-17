<?php


include('../includes/connect.php');
include('../functions/common_function.php');




if (isset($_GET['edit_category'])) {

    $edit_id = $_GET['edit_category'];
    //echo $edit_id;
    $get_data = "SELECT * from `categories` where category_id=$edit_id";
    $result_data = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($result_data);
    $category_id = $row['category_id'];
    $category_title = $row['category_title'];
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Edit Category</h1>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-outline w-50 m-auto mb-4">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" id="category_title" value="<?php echo $category_title; ?>" name="category_title" class="form-control " required="required">
            </div>

            <div class="w-50 m-auto">
                <input type="submit" name="edit_category" value="Update_Category" class="btn btn-info mb-3 px-3 ">
            </div>

        </form>
    </div>

</body>

</html>



<?php

if (isset($_POST['edit_category'])) {

    $category_title = $_POST['category_title'];
    $update_category = "UPDATE `categories` SET category_title='$category_title' where category_id=$edit_id";
    $result_update_category = mysqli_query($conn, $update_category);
    if ($result_update_category) {
        echo "<script>alert('category updated successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('category not updated ')</script>";
    }
}


?>