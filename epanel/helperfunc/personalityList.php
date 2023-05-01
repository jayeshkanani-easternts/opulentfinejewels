<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from personality") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		
		$pk = "personalityID:".$res['personalityID'];
		$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_PERSONALITY_PATH.$res['image']."&w=100&h=67&zc=0";

		$personalityID = '<td>'.$res['personalityID'].'</td>';
		$personalityTitle = '<td>'.$res['personalityTitle'].'</td>';
		$personalityDescription = '<td>'.$res['personalitySubTitle'].'</td>';
		$personalityImage = '<td><img src="'.$thumb_image.'"></td>';
        
		$Action='';
		
//		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?controller=personality&action=personality&subaction=editForm&personalityID='.$res['personalityID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
//		}
		
		
//		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| <a href="index.php?controller=personality&action=personality&subaction=delete&personalityID='.$res['personalityID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> </td>';
//		}
	$result['aaData'][] = array("$personalityID","$personalityTitle", "$personalityDescription","$personalityImage", "$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
