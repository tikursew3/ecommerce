<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<h3 class="text-center">All Orders</h3>

<table class="table table-bordered mt-5 text-center">
  <thead class="bg-info">
    <?php
    $get_orders = "SELECT * from `user_orders`";
    $result_orders = mysqli_query($conn, $get_orders);
    $row_count = mysqli_num_rows($result_orders);

    if ($row_count == 0) {
      echo "<h2 class='text-danger text-center mt-5'>There are No Orders</h2>";
    } else {
      echo "
                <th> Order ID </th>
                <th> User ID </th>
                <th> Amount Due</th>
                <th> Invoice Number </th>
                <th> Total Products </th>
                <th> Order Date </th>
                <th> Order Status </th>
           
                <th> Delete </th> ";
    }
    ?>
  </thead>
  <tbody class='bg-secondary text-light'>
    <?php
    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
      $order_id = $row_orders['order_id'];
      $user_id = $row_orders['user_id'];
      $amount_due = $row_orders['amount_due'];
      $invoice_number = $row_orders['invoice_number'];
      $total_products = $row_orders['total_products'];
      $order_date = $row_orders['order_date'];
      $order_status = $row_orders['order_status'];


      echo "
                <tr>
                <td>$order_id  </td>
                <td>$user_id  </td>
                <td>$amount_due  </td>
                <td>$invoice_number  </td>
                <td>$total_products  </td>
                <td>$order_date  </td>
                <td>$order_status  </td>
               
                <td><a href='index.php?delete_orders=$order_id' 
                    type='button' class='text-light' data-toggle='modal' data-target='#exampleModal' >
                    <i class='fa-solid fa-trash'> </i></a>
                    </td>

                </tr>
                ";
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?all_orders' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_orders=<?php echo $order_id ?>' class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>