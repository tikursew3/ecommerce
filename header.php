<?php
    @session_start();
   $local = true;

   $docRoot = "http://" . $_SERVER['HTTP_HOST'];
   if ($local == false) {
       $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2207/";
   }
   

   $path = $_SERVER['DOCUMENT_ROOT']; 
   if($local == false) {
       $path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];  
   }
   $header= $path."/Ecommerce_Website_Copy/includes/header.php"; 
   $connect= $path."/Ecommerce_Website_Copy/includes/connect.php"; 
   $functions= $path."/Ecommerce_Website_Copy/functions/common_function.php"; 
  
   include($connect);
   include($functions);
   include($header);
   




?>
