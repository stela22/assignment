<?php

// Database Connection
include ("connect.php");
 
// get Transactions
$query = "SELECT `invoice_items`.`invoice_id`,`invoices`.`client`,`invoice_items`.`amount`
			FROM `invoice_items` 
			INNER JOIN `invoices` ON `invoice_items`.`invoice_id` = `invoices`.`id`
           	ORDER BY `invoices`.`id` ASC";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}
 
$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Invoices.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Invoice ID ', 'Name', 'Invoice Amount'),";");
 
if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row ,";");
    }
}
?>