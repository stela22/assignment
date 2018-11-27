<?php
include ('connect.php'); 

if(isset($_POST["id"]))  
{  
  $output = '';  
 
  $query = "SELECT * FROM invoices WHERE id = '".$_POST["id"]."'";  
  $result = mysqli_query($conn, $query);  
  $output .= '  
  <div class="table-responsive">  
	   <table class="table table-bordered">';  
  while($row = mysqli_fetch_array($result))  
  {  
	   $output .= '  
			<tr>  
				 <td width="30%"><label>Company Name</label></td>  
				 <td width="70%">'.$row["client"].'</td>  
			</tr>  
			<tr>  
				 <td width="30%"><label>Invoice Amount</label></td>  
				 <td width="70%">'.$row["invoice_amount"].'</td>  
			</tr>  
			<tr>  
				 <td width="30%"><label>Invoice Status</label></td>  
				 <td width="70%" >'.$row["invoice_status"].'</td>  
			</tr><tr>  
				 <td width="30%"><label>Vat Rate</label></td>  
				 <td width="70%">'.$row["vat_rate"].'</td>  
			</tr><tr>  
				 <td width="30%"><label>Invoice Amount Plus Vat</label></td>  
				 <td width="70%">'.$row["invoice_amount_plus_vat"].'</td>  
			</tr>  
			<tr>  
				 <td width="30%"><label>Invoice Date</label></td>  
				 <td width="70%">'.$row["invoice_date"].'</td>  
			</tr> 
			';  
  }  
  $output .= "</table></div>";  
  echo $output;  
}  
 ?>
