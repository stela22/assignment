<?php 
	include ('connect.php'); 
	$Invoices_List_Result = mysqli_query($conn, "SELECT * FROM `invoices`");
?>
<!DOCTYPE html>  
<html>
 <head>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 
 <body>
   <div class="container" >  
		<h3 align="center">Costumer Report</h3>  
		<br/>  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<thead>
					<tr>  
						<th width="30%">Company Name</th>  
						<th width="15%"></th>  
						<th width="25%" class="status">Current Invoice Status</th>  
						<th width="30%" class="status">Update Invoice Status</th>  
					</tr>  
				</thead>
				<?php  
				while($row = mysqli_fetch_array($Invoices_List_Result))  
				{  
				?> 
				<tbody>
					<tr>  
						<td><?php echo $row["client"]; ?></td>  
						<td class="status"><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
						<td class="status"><div <?php if($row["invoice_status"] == 'paid' ): ?> style="color:green;" <?php endif; ?> class="status st" id="<?php echo $row["id"]; ?>" ><?php echo $row["invoice_status"]; ?></div></td>  
						<td class="status"><input  type="button" name="Update" value="Update" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
					</tr>
				</tbody>	
				<?php  
				}  
				?>  
			</table>  
			<button onclick="ExportCostumerReport()" class="btn export">Export Costumer Report to CSV File</button>
		</div>  
		<button  class="btn export back"onclick="goBack()">Go Back</button>
   </div>  
    
	<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Invoice Details</h4>  
                </div>  
                <div class="modal-body" id="costum_report"></div>  
			</div>  
      </div>  
	</div>  
</body>	  
		
<script>  
 $(document).ready(function(){  
	$('.view_data').click(function(){  
		var id = $(this).attr("id");  
		$.ajax({  
			url:"view.php",  
			method:"post",  
			data:{ id: id},  
			success:function(data){  
					 $('#costum_report').html(data);  
					 $('#dataModal').modal("show");  
			}  
		});  
	});  

	$('.edit_data').click(function(){  
		var id = $(this).attr("id");  
		var invoice_status = $(this).attr("invoice_status");  
		$.ajax({  
			url:"update.php",  
			method:"post",  
			data:{ id: id},  
			success:function(data){  
				$('#costum_report').html(data);  
				location.reload();
			}  
		});  
	});
});
	
function ExportCostumerReport()
{
	var conf = confirm("Export Costumer Report to CSV?");
	if(conf == true)
	{
		window.open("exportCostumerReport.php", '_blank');
	}
}

function goBack() {
    window.history.back()
}
 </script>
	
</html>