<?php 
session_start();
 if(isset($_SESSION['admin'])) {
        
    } else {
      session_destroy();
       header("location:login.php");
    }


 ?>