<?php
if($_SESSION['is_login'] != TRUE){
    header("Location: login.php");
    //302/301 Redirection
}
?>