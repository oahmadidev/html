<?php
include "config.php";
mySQLi_query($db, "SET NAMES utf8");

if (isset($_POST['docname'])) {
   $Name = $_POST['docname'];
   $Query = "SELECT `documentsType`.`en_fa_price`
   FROM `documentsType`
   WHERE `documentsType`.`documents_type` = '$Name' ";
   $ExecQuery = MySQLi_query($db, $Query);
   $Result = MySQLi_fetch_array($ExecQuery);
   echo $Result['en_fa_price'];

}

?>