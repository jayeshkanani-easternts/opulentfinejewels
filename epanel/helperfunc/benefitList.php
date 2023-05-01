<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from benefit order by sortorder") or die(ets_db_error());	
	
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "benefitID:".$res['benefitID'];
			$benefitID = '<td>'.$res['benefitID'].'</td>';
			$benefit_title = '<td>'.$res['benefit_title'].'</td>';
			
			$Sortorder='<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
			$Status='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
			
			$Action='';
		
//			if(strpos($_SESSION['userper'],'e') !== false) { 
				$Action.= '<td><a href="index.php?controller=benefit&action=benefit&subaction=editForm&benefitID='.$res['benefitID'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a>';
//			}


//			if(strpos($_SESSION['userper'],'d') !== false) {
				$Action.= '| <a href="index.php?controller=benefit&action=benefit&subaction=delete&benefitID='.$res['benefitID'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
			</td>';
//			}
				
			
			$result['aaData'][] = array( "$benefitID", "$benefit_title",  "$Status","$Sortorder","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>
