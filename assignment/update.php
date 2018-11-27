<?php
include ('connect.php'); 

if(isset($_POST['id'])){
	
	$id = $_POST['id'];
	
	$result  = mysqli_query($conn , "UPDATE `invoices` SET `invoice_status` = IF(`invoice_status` = 'paid', 'unpaid', IF(`invoice_status` = 'unpaid' ,'paid', `invoice_status`)) WHERE id='$id'");

}
 ?>
