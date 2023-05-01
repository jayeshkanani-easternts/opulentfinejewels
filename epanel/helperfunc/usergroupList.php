<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from group_master") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['group_status'] == 'E')
				$status = 'Enabled';
			else
				$status = 'Disabled';
			
			$pk = "group_id:".$res['group_id'];
			$Question = '<td><a href="#" class="estatus" data-type="select" data-name="group_status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
			
				$QuestionTitle='<td>'.$res['group_name'].'</td>';
			   // $Question='<td>'.$status.'</td>';
				
				$Action='<td><a href="index.php?controller=user&action=usergroup&subaction=editForm&id='.$res['group_id'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a> |
				<a href="index.php?controller=user&action=usergroup&subaction=delete&id='.$res['group_id'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		
				$result['aaData'][] = array( "$QuestionTitle","$Question","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>
