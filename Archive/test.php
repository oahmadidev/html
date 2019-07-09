<?php



include "config.php";

$count = 0;
$getPrice= "SELECT * 
    FROM fixed_elements";
    $result = mysqli_query($db, $getPrice);

while ($row = mysqli_fetch_assoc($result)) {
    $price = $row["price"];
    $count = $count + 1 ;
    if ($count == 1) {
        $polompPrice = $price;
    } elseif ($count == 2) {
        $scanPrice = $price;
    } elseif ($count == 3) {
        $polompScanPrice = $price;
    } elseif ($count == 4) {
        $certifyTrueCopyPrice = $price;
    } elseif ($count == 5) {
        $copyPrice = $price;
    } elseif ($count == 6) {  
        $secondEdditionRate = $price;
    } elseif ($count == 7) {
        $judiciaryStampPrice = $price;
    } elseif ($count == 8) {
        $foreignAffairsStampPrice = $price;
    } elseif ($count == 9) {
        $judiciaryCertifyCopyPrice = $price;
    } elseif ($count == 10) {
        $judiciaryServicePrice = $price;
    } elseif ($count == 11) {
        $foreignAffairsServicePrice = $price;
    } elseif ($count == 12) {
        $judiciaryPolompStampPrice = $price;
    }    
}



?>