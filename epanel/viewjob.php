<?php 
	include("includes/configure.php");
	$j_sql = "Select * from job_master where job_id = '".$_REQUEST['job_id']."'";
	$j_qry = ets_db_query($j_sql) or die(ets_db_error().$j_sql);
	$j_rs = ets_db_fetch_assoc($j_qry);
	$id = $j_rs['job_id'];
	$name = $j_rs['j_name'];
	$email = $j_rs['j_email'];
	$mobile = $j_rs['j_contact'];
	$address = $j_rs['j_area'];
	$resume = $j_rs['j_resume'];
	$jdate = date("d-m-Y H:i a",strtotime($j_rs['j_date']));
	?>
	
<!--<link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen" />-->
	<table class="main" cellspacing="3" cellpadding="3" width="100%">
		<tr>
		<th align="right" width="130">Date.&nbsp;:&nbsp;</th>
		<td><?php echo $jdate; ?></td>
		</tr>
		
		<tr>
		<th align="right" width="130">Name&nbsp;:&nbsp;</th>
		<td><?php echo $name; ?></td>
		</tr>
		
		<tr>
		<th align="right">E-Mail&nbsp;:&nbsp;</th>
		<td><?php echo $email; ?></td></tr>
		
		<tr>
		<th align="right">Mobile&nbsp;:&nbsp;</th>
		<td><?php echo $mobile; ?></td>	
		</tr>
		
		<tr>
<!--
		<th align="right">Address&nbsp;:&nbsp;</th>
		<td><?php echo $address; ?></td>	
		</tr>
-->

		<tr>
		<th align="right">Download Resume&nbsp;:&nbsp;</th>
		<td><a href="<?php echo DIR_WS_BIODATA_PATH.$resume; ?>" target = "_blank">Download</a></td>
		
		</tr>
	</table>


