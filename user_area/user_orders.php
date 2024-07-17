
    <?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * from `user_table` where username = '$username'";
    $result = mysqli_query($conn,$get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    //echo $user_id;





?>






    <h3 class="text-success text-center">My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl no</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_order_details = "SELECT * from `user_orders` where user_id = $user_id";
            $result_orders = mysqli_query($conn,$get_order_details);
            $sequence_number = 1;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $invoice_number = $row_orders['invoice_number'];
                $total_products = $row_orders['total_products'];
                $order_status = $row_orders['order_status'];
                if($order_status == 'pending') {
                    $order_status = 'Incomplete';

                } else {
                    $order_status = 'Complete';
                }
                $order_date = $row_orders['order_date'];
               
                echo "
                <tr>
                <td>$sequence_number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                ?>
                <?php     
                if($order_status == 'Complete') {
                    $delete_query = "DELETE from `orders_pending` where order_id=$order_id ";
                    $result_delete = mysqli_query($conn, $delete_query);
                    //$paid_query = "UPDATE `orders_pending` set order_status='Paid' where order_id=$order_id";
                    //$result_paid = mysqli_query($conn, $paid_query);
                    echo " <td>Paid</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' 
                    class='text-light'>Confirm</a></td> </tr>";
                }
                
                
                
                
            
           
               
                
               
                
                $sequence_number += 1;
             
                
            }
            

            ?>
           

        </tbody>
    </table>
    
</body>
</html>