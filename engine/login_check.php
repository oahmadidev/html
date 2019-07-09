<?php
session_start();
require_once "config.php"; 
$userName = $userPassword = "";
//$isValidUsername = [0];
mySQLi_query($db, "SET NAMES utf8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $userName = test_input($_POST["username"]);
  $userPassword = test_input($_POST["password"]);
  $checkUserExist= "SELECT * 
                    FROM account 
                    WHERE account.username = '$userName' and account.password= '$userPassword'";
  $result = mysqli_query($db, $checkUserExist);
  $resultInDic = mysqli_fetch_assoc($result);

  if (($resultInDic["username"] == $userName  and $resultInDic["password"] == $userPassword ) == True ) {
      $firstName = $resultInDic["firstname"];
      $lastName =  $resultInDic["lastname"];
      $_SESSION["is_login"] = True;
      $_SESSION["username"] = $userName; 
      $_SESSION["firstname"] = $resultInDic["firstname"];
      $_SESSION["lastname"] = $resultInDic["lastname"];
      header("location: ../index.php");
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>