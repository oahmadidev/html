<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'tbinvoice');
   define('DB_PASSWORD', 'xaFU512P9Nh8XxTL');
   define('DB_DATABASE', 'tb_invoice');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error()); 
?>
