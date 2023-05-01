<?php 
	include("includes/configure.php");
	$j_sql = "Select * from faq where faq_Id = '".$_REQUEST['fid']."'";
	$j_qry = ets_db_query($j_sql) or die(ets_db_error().$j_sql);
	$row = ets_db_fetch_assoc($j_qry);
	$id = $row['faq_Id'];
    $name = $row['name'];
    $review = $row['review'];

?>
	
<!--<link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen" />-->
	<table class="table table-bordered" cellspacing="3" cellpadding="3" width="100%">
        <tr>
		<th align="right" width="130">ID.&nbsp;:&nbsp;</th>
		<td><?php echo $id; ?></td>
		</tr>
       
		<tr>
		<th align="right" width="130">Title.&nbsp;:&nbsp;</th>
		<td><?php echo $name; ?></td>
		</tr>
        
        <tr>
		<th align="right" width="130">Description&nbsp;:&nbsp;</th>
		<td><?php echo $review; ?></td>
		</tr>
        
       
	</table>


