<?php
    session_start();
    unset($_SESSION['admin_username']);
   // session_unset();
   // session_destroy();
    echo "<script>window.open('../index.php', '_self')</script>"
   // header("Location:../index.php");
?>








