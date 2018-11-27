<?php 
	include ('connect.php'); 
?>
<!DOCTYPE html>  
<html>
 <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="css/pagination.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/pagination.js"></script>
 </head>
 
 <body>
	<div class="container">
		<h3 align="center">Invoices</h3>  
		<br/> 
		<div class="table-responsive">  
			<table class="table table-bordered"> 
				<thead>
					<tr>
						<th class="status" width="35%">Company Name</th>
						<th class="status" width="10%">Invoice ID</th>
						<th class="status" width="15%">Name</th>
						<th class="status" width="15%">Amount</th>
						<th class="status" width="25%">Created at</th>
					</tr>
				</thead>
				
				<tbody class="page">
					<?php 
					$Invoices_List_Result = mysqli_query($conn, "SELECT `invoice_items`.`invoice_id`,`invoices`.`client`,`invoice_items`.`amount`,`invoice_items`.`name`,`invoice_items`.`created_at`
															FROM `invoice_items` 
															JOIN `invoices` ON `invoice_items`.`invoice_id` = `invoices`.`id`
															ORDER BY `invoice_items`.`created_at` DESC");
					while($row = mysqli_fetch_assoc($Invoices_List_Result)): ?>
						<tr>
							<td> <?php echo $row['client']; ?></td>
							<td> <?php echo $row['invoice_id']; ?></td>
							
							<td> <?php echo $row['name']; ?></td>
							<td> <?php echo $row['amount']; ?></td>				
							<td> <?php echo $row['created_at']; ?></td>
						</tr>
					<?php endwhile ;?>
				</tbody>
			</table>  
			<button onclick="ExportInvoices()" class="btn export">Export Invoices to CSV File</button>
		</div>
		<button  class="btn export back"onclick="goBack()">Go Back</button>
	</div>
</body>

<script>
$(document).ready(function()
{
	$("#tab").pagination({
		items: 5,
		contents: 'page',
		previous: 'Previous',
		next: 'Next',
		position: 'bottom',
   });
});

function ExportInvoices()
        {
            var conf = confirm("Export Invoices to CSV?");
            if(conf == true)
            {
                window.open("exportInvoices.php", '_blank');
            }
        }
		
function goBack() {
    window.history.back()
}
</script>
</html>

