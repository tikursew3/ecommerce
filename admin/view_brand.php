<?php
include('../includes/connect.php');
include('../functions/common_function.php');


?>
<h3 class="text-center">All Brands</h3>

<table class="table table-bordered mt-5 text-center">
  <thead class="bg-info">
    <tr>
      <th>Brand Id</th>
      <th>Brand Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody class="bg-secondary text-light">
    <?php
    $get_brands = "SELECT * from `brands`";
    $result_brands = mysqli_query($conn, $get_brands);
    while ($row_brands = mysqli_fetch_assoc($result_brands)) {
      $brand_id = $row_brands['brand_id'];
      $brands_title = $row_brands['brand_title'];

    ?>
      <tr class='text-center '>
        <td><?php echo $brand_id; ?></td>
        <td><?php echo $brands_title; ?></td>


        <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='nav-link text-light '><i class='fa-solid
                    fa-pen-to-square'> </i></a>
        </td>

        <td><a href='index.php?delete_brands=<?php echo $brand_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_brands' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_brands=<?php echo $brand_id ?>' class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>