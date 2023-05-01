<?php 	
header ("Content-type: application/x-msexcel");
header("Content-disposition:  attachment; filename=Brochuredownloads.xls");
require('includes/configure.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8" />
</head>
<body>
<table class="main" cellspacing="3" cellpadding="3" border="1">
<tr>
			<th>Name</th>
			<th>Mobile No</th>
			<th>Email</th>
			<th>Date</th>
			<th>Project</th>
</tr>
<?php
	$disQry =  "SELECT * from download_brochure order by bdate desc";	
	$ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {
		
		while($res = ets_db_fetch_array($ressql)){
			echo '<tr>';
			echo '<td>'.$res['bname'].'</td>';	
			echo '<td>'.$res['bphone'].'</td>';
			echo '<td>'.$res['bemail'].'</td>';
			echo '<td>'.date('Y-m-d',strtotime($res['bdate'])).'</td>';
			echo '<td>'.$res['bproject'].'</td>';
			echo '</tr>';
		}
	}
?>
</table>


