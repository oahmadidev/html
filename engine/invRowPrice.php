<?php

$documentqty = isset($_POST['documentqty']) ? $_POST['documentqty'] : 0;
$polomp = isset($_POST['polomp']) ? $_POST['polomp'] : 0;
$paper = isset($_POST['paper']) ? $_POST['paper'] : 0;
$edditiontype = isset($_POST['edditiontype']) ? $_POST['edditiontype'] : 0;
$stamp = isset($_POST['stamp']) ? $_POST['stamp'] : 0;
//$emergancyStatus = isset($_POST['emergancyStatus']) ? $_POST['emergancyStatus'] : 0;
//$serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : 0;
$price = isset($_POST['price']) ? $_POST['price'] : 0;
$overplusprice = isset($_POST['overplusprice']) ? $_POST['overplusprice'] : 0;


$polompPrice = 150000;
$certifyCopyPrice = 10000;
$edditionRate = 0.2;
$stampM = 0;
$stampD = 600000;
$stampKH = 60000;
$stampB = 200000;
$emergancyPrice = 250000;
$scanprice = 10000;
$scanPolompPrice = 25000;



if ($edditiontype == "secondry")    {$price = $price*$edditionRate;}

if      ($stamp == "M")         {$stampPrice = 0;}
elseif  ($stamp == "MD")        {$stampPrice = $stampD * $polomp;}
elseif  ($stamp == "MDKH")      {$stampPrice = $stampD * $polomp + $stampKH * $paper;}
elseif  ($stamp == "MDBKH")     {$stampPrice = $stampD * $polomp + $stampKH * $paper + $stampB * $polomp;}
else                                {$stampPrice = 0;}

//if ($emergancyStatus == "emergance") {$emergancyPrice = $emergancyPrice * $document;}
//else                                 {$emergancyPrice = 0;}

//if ($serviceType == "mustscanned")   {$scanprice = $scanprice * $document +
//                                      $scanPolompPrice * $polomp;  }
//else                                 {$scanprice = 0;}

$price =    (int)$documentqty * (int)$price + 
            (int)$polomp * (int)$polompPrice + 
            (int)$paper * (int)$certifyCopyPrice + 
            (int)$stampPrice + 
            (int)$overplusprice;

//$price = $price * $documentqty;

if ($price > 0) {
  echo $price ;

}
else {
  echo "0.0";
}



?>