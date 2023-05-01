<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from group_master where group_status = 'E' and group_id in (select distinct group_id from permission_master)") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			$GroupId='<td>'.$res['group_id'].'</td>';
			$GroupName='<td>'.$res['group_name'].'</td>';
			   // $Question='<td>'.$status.'</td>';
				
				$Action='<td><a href="index.php?controller=permission&action=permission&subaction=editForm&id='.$res['group_id'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a> |
				<a href="index.php?controller=permission&action=permission&subaction=delete&id='.$res['group_id'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		
				$result['aaData'][] = array( "$GroupId","$GroupName","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>
