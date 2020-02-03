<?php
include  "config.php";
include_once  "common.php";

if($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue; // skip the heading header of sheet
            }
                $date = $connection->real_escape_string($data[0]);
                $category = $connection->real_escape_string($data[1]);
                $lot_title = $connection->real_escape_string($data[2]);
                $lot_location = $connection->real_escape_string($data[3]);
                $lot_condition = $connection->real_escape_string($data[4]);
                $pre_tax_amount = $connection->real_escape_string($data[5]);
                $tax_name = $connection->real_escape_string($data[6]);
                $tax_amount = $connection->real_escape_string($data[7]);
                $common = new Common();
                $SheetUpload = $common->uploadData($connection,$date,$category,$lot_title, $lot_location, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount);
        }
        if ($SheetUpload){
            echo "<script>alert('Excel file has been uploaded successfully !');window.location.href='index.php';</script>";
        }
    }
}
?>