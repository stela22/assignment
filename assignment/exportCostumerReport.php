<?php
	
// Database Connection
include ("connect.php");
 

$query =	"SELECT `invoices`.`client`,SUM(`invoice_items`.`amount`),(IF (`invoice_status` = 'paid', `invoices`.`invoice_amount`,'0')),SUM(`invoice_items`.`amount`) - (IF (`invoice_status` = 'paid', `invoices`.`invoice_amount`,'0')) AS RESULT 
			FROM `invoice_items`
			INNER JOIN `invoices` ON `invoice_items`.`invoice_id` = `invoices`.`id`
			GROUP BY `invoices`.`client`";
			
			
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
header('Content-Disposition: attachment; filename=CostumerSupport.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Company Name', 'Total Invoiced Amount', 'Total Amount Paid', 'Total Amount Outstanding'),";");
 
if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row ,";");
    }
}
?>