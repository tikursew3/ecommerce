
<?php
     include('../includes/connect.php');
     include('../functions/common_function.php');
     
    ?>

<h3 class="text-center">All payments</h3>

<table class="table table-bordered mt-5 text-center">
        <thead class="bg-info">
        <?php
            $get_payments = "SELECT * from `user_payments`";
            $result_payments = mysqli_query($conn,$get_payments);
            $row_count = mysqli_num_rows($result_payments);

            if($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5'>There are No payments so far</h2>";
            } else {
                echo "
                <th> Payment ID </th>
                <th> Order ID </th>
                <th> Invoice Number </th>
                <th> Amount </th>
                <th> Payment Mode </th>
                <th> Date </th>
               
           
                <th> Delete </th> ";
            }
            ?>
            </thead>
            <tbody class='bg-secondary text-light'>
            <?php
             while($row_payments = mysqli_fetch_assoc($result_payments)) {
                $payment_id = $row_payments['payment_id']; 
                $order_id = $row_payments['order_id']; 
                $invoice_number = $row_payments['invoice_number'];  
                $amount = $row_payments['amount']; 
                $payment_mode = $row_payments['payment_mode']; 
                $date = $row_payments['date']; 
               
                

                echo "
                <tr>
                <td>$payment_id  </td>
                <td>$order_id  </td>
                <td>$invoice_number  </td>
                
                <td>$amount </td>
                <td>$payment_mode  </td>
                <td>$date  </td>
                
               
                <td><a href='index.php?delete_payments=$order_id' 
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?all_payments' 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_payments=<?php echo $payment_id?>' 
                    class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>