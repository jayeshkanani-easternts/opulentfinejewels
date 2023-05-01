<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from research where status ='E' order by sortorder desc") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		
		$pk = "researchID:".$res['researchID'];
		$researchTitle = '<td>'.$res['researchTitle'].'</td>';
		$type = $res['type'];
		
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}

		$researchStatus = '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		$researchSortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
		
		$Action='';
		
		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?controller=research&action=research&subaction=editForm&researchID='.$res['researchID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
		}

		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| 
				<a href="index.php?controller=research&action=research&subaction=delete&researchID='.$res['researchID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		}
		
		$result['aaData'][] = array( "$researchTitle", "$type" , "$researchStatus","$researchSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
