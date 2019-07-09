<?php
include "config.php";
mySQLi_query($db, "SET NAMES utf8");
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $Query = "SELECT `documentsType`.`documents_type`
   FROM `documentsType`
   WHERE `documentsType`.`documents_type` LIKE '%$Name%' LIMIT 10 ";
   $ExecQuery = MySQLi_query($db, $Query);
 
   echo '

   ';
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
   ?>

   <p onclick='fill("<?php echo $Result['documents_type']; ?>")'>
   <a>
       <?php echo $Result['documents_type']; ?>
   </p></a>
   <?php
}}
?>

