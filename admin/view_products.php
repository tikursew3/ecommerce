

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>

    <?php
     include('../includes/connect.php');
     include('../functions/common_function.php');
     
    ?>
 
</head>
<body>
    <h3 class="text-center text-success">All product</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_products = "SELECT * from `products`";
            $result_products = mysqli_query($conn,$get_products);
            while($row_products = mysqli_fetch_assoc($result_products)) {
                $product_id = $row_products['product_id'];  
                $product_title = $row_products['product_title'];
                $product_image1 = $row_products['product_image1'];
                $product_price = $row_products['product_price'];
                $status = $row_products['status'];
                ?>               
                <tr class='text-center '>
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img  src='../images/<?php echo $product_image1; ?>' class='product_img'/></td>
                    <td><?php echo $product_price;?></td> 
                    <td> <?php
                    $get_count = "SELECT * from `orders_pending` where product_id=$product_id";
                    $result_count = mysqli_query($conn,$get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?></td>

                    <td><?php echo $status; ?></td>
                    <td><a href='index.php?edit_products=<?php echo $product_id?>' class='nav-link text-light '><i class='fa-solid
                    fa-pen-to-square'> </i></a>
                    </td>

                    <td><a href='index.php?delete_products=<?php echo $product_id?>'
                    type="button" class="text-light" data-toggle="modal" data-target="#exampleModal" >
                     <i class='fa-solid fa-trash'> </i></a>
                    </td>

                  
                </tr>
            <?php                    
            }            
            ?>                     
        </tbody>
    </table>  


    <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
 -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <h4>are you sure you want delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_products' 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_products=<?php echo $product_id?>' 
                    class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
    
    

</body>
</html>