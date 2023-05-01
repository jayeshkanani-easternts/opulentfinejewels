<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from banner_image") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		
		$pk = "bannerID:".$res['bannerID'];
		$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_BANNER_PATH.$res['image']."&w=100&h=67&zc=0";

		$bannerId = '<td>'.$res['bannerID'].'</td>';
		$bannerTitle = '<td>'.$res['bannerTitle'].'</td>';
		$bannerImage = '<td><img src="'.$thumb_image.'"></td>';
        
		$Action='';
		
		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?controller=banner&action=banner&subaction=editForm&bannerID='.$res['bannerID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
		}
		
		
		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| <a href="index.php?controller=banner&action=banner&subaction=delete&bannerID='.$res['bannerID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> </td>';
		}
		

//		$Action = '<td>
//		<a href="index.php?controller=banner&action=banner&subaction=editForm&bannerID='.$res['bannerID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
//		<a href="index.php?controller=banner&action=banner&subaction=delete&bannerID='.$res['bannerID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> 
//         </td>';
		
		
		$result['aaData'][] = array( "$bannerId","$bannerTitle", "$bannerImage", "$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
