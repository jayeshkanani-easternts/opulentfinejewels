<?php 	
		header ("Content-type: application/x-msexcel");
        header("Content-disposition:  attachment; filename=Subscriptionlist.xls");
	 	require('includes/configure.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8" />
</head>
<body>
<?php 
//echo $_SESSION['listSQL'];
	
?>
	

<table class="main" cellspacing="3" cellpadding="3" border="1">
<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Date</th>
</tr>
<?php
	if(isset($_SESSION['listSQL'])){ 
		 $disQry = $_SESSION['listSQL'];
	}
	else
	{
		$disQry =  "SELECT  * from subscription_master where status='E' order by s_date DESC";	
	}
//	$merge = "order by s_date DESC";
//	$disQry = $disQry . $merge;
//	$disQry = $disQry;
	
	$ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {
		
		while($res = ets_db_fetch_array($ressql)){
			echo '<tr>';
			//if($res['gcm_id'] == ""){ $sfrom = 'Website';}else{ $sfrom = 'Mobile';}
			//echo '<td>'.$sfrom.'</td>';	
			echo '<td>'.$res['s_name'].'</td>';	
			echo '<td>'.$res['s_mobile'].'</td>';
			echo '<td>'.$res['s_email'].'</td>';
			echo '<td>'.date('Y-m-d',strtotime($res['s_date'])).'</td>';	
			echo '</tr>';
		}
	}
?>
</table>

