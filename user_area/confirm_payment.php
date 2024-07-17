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
    $header= $path."/Ecommerce_Website_Copy/user_area/header.php"; 
    $connect= $path."/Ecommerce_Website_Copy/includes/connect.php"; 
    $functions= $path."/Ecommerce_Website_Copy/functions/common_function.php"; 
   
    include($connect);
    include($functions);
    
    include($header);
    @session_start();


    if(isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
       

    
    // global $conn;
        $select_data = "SELECT * from `user_orders` where order_id=$order_id";
        
        $result = mysqli_query($conn,$select_data);
    
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
    
        $amount_due = $row_fetch['amount_due'];
    }
    if(isset($_POST['confirm_payment'])) {
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];

        $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode) 
        values ($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($conn, $insert_query);
        if($result) {
            echo "<script>alert('successfully completed the payment')</script>";
            //echo "<h3 class='text-center text-light'>successfully completed the payment</h3>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_orders = "UPDATE `user_orders` set order_status='complete' where order_id=$order_id";
        $result_orders = mysqli_query($conn, $update_orders);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>

     <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
    <!-- font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- bootstrap js link --> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">



</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST"> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" 
                value="<?php echo $invoice_number; ?>">

            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" 
                value="<?php echo $amount_due; ?>">
                
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-60 m-auto">
                    <option value="">Select Payment Mode</option>
                    <option value="">UPI</option>
                    <option value="">Netbanking</option>
                    <option value="">Paypal</option>
                    <option value="">Cash on Delivery</option>
                    <option value="">Pay off Line</option>

                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              
                <input type="submit" class="bg-info border-0 py-2 px-3 " value="Confirm" name="confirm_payment">
                
            </div>
        </form>
    </div>

 
    
</body>
</html>