<?php  
  
session_start();
session_destroy();  
$_SESSION['is_login'] != True;
header("Location: ../login.php");
?>  