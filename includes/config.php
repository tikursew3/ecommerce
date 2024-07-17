<?php 
    $conn = mysqli_connect("localhost", "ics325su2207", "6568");
    $db = mysqli_select_db($conn,'ics325su2207');
    if(!$conn)
       {
           die("Connection Failed:" . mysqli_connect_error());
           
   
       }
       
?>