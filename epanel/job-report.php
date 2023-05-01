<?php 	
header ("Content-type: application/x-msexcel");
header("Content-disposition:  attachment; filename=JobReport.xls");
require('includes/configure.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8" />
</head>
<body>
<table class="main" cellspacing="3" cellpadding="3" border="1">
<tr>
			<th>Date</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Address</th>
			<th>Experience</th>
</tr>
<?php
	$disQry =  "SELECT * from job_master order by j_date desc";	
	$ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {	
		while($res = ets_db_fetch_array($ressql)){
			echo '<tr>';
			echo '<td>'.date("d-m-Y H:i a",strtotime($res['j_date'])).'</td>';	
			echo '<td>'.$res['j_name'].'</td>';	
			echo '<td>'.$res['j_email'].'</td>';
			echo '<td>'.$res['j_contact'].'</td>';
			echo '<td>'.$res['j_area'].'</td>';
			echo '<td>'.$res['j_exp'].'</td>';
			echo '</tr>';
		}
	}
?>
</table>



