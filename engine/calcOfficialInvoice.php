<?php
session_start();
include "config.php";
mySQLi_query($db, "SET NAMES utf8");


$document = $documentQty = $polompQty = $paperQty = $translationLanguge =$surePlus = $price = 0 ;
$stampType = $emergancyStatus  = 0 ;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Get Fixed Elements from  DB */
    $id = 0;
    $getPrice= "SELECT * 
    FROM fixed_elements";
    $result = mysqli_query($db, $getPrice);

    while ($row = mysqli_fetch_assoc($result)) {
        $price = $row["price"];
        $id = $id + 1 ;
        if ($id == 1) {
            $polompPrice = $price;
        } elseif ($id == 2) {
            $scanPrice = $price;
        } elseif ($id == 3) {
            $polompScanPrice = $price;
        } elseif ($id == 4) {
            $certifyTrueCopyPrice = $price;
        } elseif ($id == 5) {
            $copyPrice = $price;
        } elseif ($id == 6) {  
            $secondEdditionRate = $price;
        } elseif ($id == 7) {
            $judiciaryStampPrice = $price;
        } elseif ($id == 8) {
            $foreignAffairsStampPrice = $price;
        } elseif ($id == 9) {
            $judiciaryCertifyCopyPrice = $price;
        } elseif ($id == 10) {
            $judiciaryServicePrice = $price;
        } elseif ($id == 11) {
            $foreignAffairsServicePrice = $price;
        } elseif ($id == 12) {
            $judiciaryPolompStampPrice = $price;
        } elseif ($id == 13) {
            $emergancyPrice = $price;
        }  
    }
    /* /Get Fixed Elements from  DB */

    /* Get Form Data */
    $document = $_POST["document"];
    $documentQty = $_POST["document-qty"];
    $polompQty = $_POST["polomp-qty"];
    $paperQty = $_POST["paper-qty"];
    $translationLanguge = $_POST["translation-language"];
    $surePlus = $_POST["sure-plus"];
    $price = $_POST["price"];
    $documentType = $_POST["document-type"];
    $stampType = $_POST["stamp-type"];
    $emergancyStatus = $_POST["emergancy-status"];
    $service = $_POST["service"];
    /* /Get Form Data */

    /* Get Document Price and Calculate Price from MySQL $translationPrice */
    $getDocumentPrice= "SELECT * 
    FROM documentsType 
    WHERE documentsType.documents_type = '$document'";
    $result = mysqli_query($db, $getDocumentPrice);
    $resultInDic = mysqli_fetch_assoc($result);

    if ($translationLanguge == "english") {
        $translationPrice = $resultInDic["en_fa_price"];
    } else {
        $translationPrice = $resultInDic["not_en_fa_price"];
    }
    $orginalTranslationPrice = $translationPrice;
    if ($documentType == "primary") {
        $translationPrice = $documentQty * $translationPrice;
    } else {
        $translationPrice = $documentQty * $translationPrice * $secondEdditionRate;
    }
    /* /Get Document Price and Calculate Price from MySQL $translationPrice */

    $polompPrice = $polompPrice * $polompQty;
    $copyPrice = $copyPrice * $paperQty;
    $certifyTrueCopyPrice = $certifyTrueCopyPrice * $paperQty;

    /* Calculate Stamp Price $stampPrice */
    if ($stampType == "M" or $stampType == "un-official") {
        $stampPrice = 0;
    } elseif ($stampType == "M-D") {
        $stampPrice =   $judiciaryStampPrice * $documentQty + 
                        $judiciaryPolompStampPrice * $polompQty;
    } elseif ($stampType == "M-D-B") {
        $stampPrice =   $judiciaryStampPrice * $documentQty + 
                        $judiciaryPolompStampPrice * $polompQty + 
                        $judiciaryCertifyCopyPrice * $paperQty;
    } elseif ($stampType == "M-D-KH") {
        $stampPrice =   $judiciaryStampPrice * $documentQty + 
                        $judiciaryPolompStampPrice * $polompQty + 
                        $foreignAffairsStampPrice * $paperQty;
    } elseif ($stampType == "M-D-B-KH") {
        $stampPrice =   $judiciaryStampPrice * $documentQty +
                        $judiciaryPolompStampPrice * $polompQty +
                        $judiciaryCertifyCopyPrice * $paperQty +
                        $foreignAffairsStampPrice * $paperQty;
    }
    /* /Calculate Stamp Price $stampPrice */
    

    if ($emergancyStatus == "emergance") {
        $emergancyPrice = $emergancyPrice * $polompQty;
    } else {
        $emergancyPrice = 0;
    }
    if ($service == "must-scanned") {
        $paperScanPrice = $paperScanPrice * $paperQty;
        $polompScanPrice = $polompScanPrice * $polompQty;
        $scanPrice = $paperScanPrice + $polompScanPrice;
    } else {
        $service = 0;
    }

    $totalPrice =   $translationPrice + 
                    $polompPrice + 
                    $copyPrice + 
                    $certifyTrueCopyPrice + 
                    $service +
                    $stampPrice +
                    $emergancyPrice;


    
    $invoiceRow = [
        "document" => $document,
        "document-type" => $documentType,
        "emergancy-status" => $emergancyStatus,
        "service" => $service,
        "document-qty" => $documentQty,
        "document-polomp-qty" => $polompQty,
        "document-paper-qty" => $paperQty,
        "stamp-type" => $stampType,
        "translation-price" => $orginalTranslationPrice,
    
    ];



}
?>