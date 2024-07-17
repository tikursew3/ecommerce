<?php 
    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn,'Ecommerce_store');
    if(!$conn)
       {
           die("Connection Failed:" . mysqli_connect_error());
           
   
       }
       
?>