<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from sliderimage order by sliderPosition, sortorder") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}
		if($res['sliderPosition']=='H'){
			$position = "Home Page";
		}else{
			$position = "Inner Page";
		}
		$pk = "sliderID:".$res['sliderID'];
		$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_SLIDER_PATH.$res['image']."&w=100&h=67&zc=0";

		$sliderTitle = '<td>'.$res['sliderTitle'].'</td>';
		$sliderPosition = '<td>'.$position.'</td>';
		$sliderImage = '<td><img src="'.$thumb_image.'"></td>';
		$sliderStatus = '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		$sliderSortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
//		$Action = '<td><a href="index.php?controller=slider&action=slider&subaction=editForm&sliderID='.$res['sliderID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
//				<a href="index.php?controller=slider&action=slider&subaction=delete&sliderID='.$res['sliderID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
//				</td>';
		
		$Action='';
		
		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?controller=slider&action=slider&subaction=editForm&sliderID='.$res['sliderID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
		}
		
		
		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| 
				<a href="index.php?controller=slider&action=slider&subaction=delete&sliderID='.$res['sliderID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		}
		
		
		$result['aaData'][] = array( "$sliderTitle",  "$sliderImage", "$sliderStatus","$sliderSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>
