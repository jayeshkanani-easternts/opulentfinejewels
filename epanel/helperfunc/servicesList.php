<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from services") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		
		$pk = "serviceID:".$res['serviceID'];
		$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_SERVICES_PATH.$res['image']."&w=100&h=67&zc=0";

		$serviceID = '<td>'.$res['serviceID'].'</td>';
		$serviceTitle = '<td>'.$res['serviceTitle'].'</td>';
		$serviceDescription = '<td>'.$res['description'].'</td>';
		$serviceImage = '<td><img src="'.$thumb_image.'"></td>';
        
		$Action='';
		
//		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?controller=services&action=services&subaction=editForm&serviceID='.$res['serviceID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
//		}
		
		
//		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| <a href="index.php?controller=services&action=services&subaction=delete&serviceID='.$res['serviceID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> </td>';
//		}
	$result['aaData'][] = array("$serviceID","$serviceTitle", "$serviceDescription","$serviceImage", "$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
