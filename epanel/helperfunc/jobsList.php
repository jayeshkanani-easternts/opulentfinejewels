<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from jobs order by  sortorder") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}


		$pk = "job_id:".$res['job_id'];

		$jobTitle = '<td>'.$res['job_title'].'</td>';
		$jobLocation = '<td>'.$res['job_location'].'</td>';

		$jobStatus = '<td><a href="#" class="estatus" data-type="select" data-value = "'.$res['status'].'" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		$jobSortorder = '<td><a href="#" class="esortorder" data-value = "'.$res['sortorder'].'" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
		$Action = '<td><a href="index.php?controller=jobs&action=jobs&subaction=editForm&job_id='.$res['job_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=jobs&action=jobs&subaction=delete&job_id='.$res['job_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		$result['aaData'][] = array( "$jobTitle", "$jobLocation", "$jobStatus","$jobSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
