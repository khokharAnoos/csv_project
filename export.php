<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("config.php");

// get Users
$query = "SELECT date, category, lot_title, lot_location, lot_condition, pre_tax_amount, tax_name, tax_amount FROM csv_file";
if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=CSV.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('date', 'category', 'lot_title', 'lot_location', 'lot_condition', 'pre_tax_amount', 'tax_name', 'tax_amount'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>