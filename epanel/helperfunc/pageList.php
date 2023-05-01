<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	include ('../includes/functions/page_functions.php');
	$result = array('aaData' => array());
	$sqlsel = "select * from page_master  order by page_id";
	$ressql = ets_db_query($sqlsel) or die('Query failed : ' . ets_db_error());

	while($row = ets_db_fetch_array($ressql)){
			if($row['status'] == 'D'){
					$pgstatus = 'Draft';
				}else{
					$pgstatus = 'Published';
				}
	$pk = "page_id:".$row['page_id'];
	
	if($row['parent_id'] > 0)
	{
		$q = "select * from page_master where page_id =".$row['parent_id'];
		$r = ets_db_query($q);
		$arr = ets_db_fetch_assoc($r);
		$parent = $arr['page_title'];
	}
	else
	{
		$parent = 'Self';
	}
	
	$Parent = '<td>'.$parent.'</td>';
    $Name = '<td><b>'.$row['page_title'].'</b></td>';
	$status	= '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$pgstatus.'</a></td>';
	$sortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$row['sortorder'].'</a></td>';
					
	
//	$Action = '<td><a href="index.php?page_id='.$row['page_id'].'&controller=pages&action=pages&subaction=editForm" '.$row['page_title'].'" title="Editing Page '.$srow['page_title'].'" class="btn btn-success"><i class="fa fa-edit"></i></a>
//	  | <a href="index.php?controller=pages&action=pages&subaction=delete&id='.$row['page_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a></td>';
		
	
	$Action='';
		
		if(strpos($_SESSION['userper'],'e') !== false) { 
			$Action.= '<td><a href="index.php?page_id='.$row['page_id'].'&controller=pages&action=pages&subaction=editForm" '.$row['page_title'].'" title="Editing Page '.$srow['page_title'].'" class="btn btn-success"><i class="fa fa-edit"></i></a>';
		}
		
		
		if(strpos($_SESSION['userper'],'d') !== false) {
			$Action.= '| <a href="index.php?controller=pages&action=pages&subaction=delete&id='.$row['page_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a></td>';
		}	
		
		
		
		
	$Preview = '<td><a href="'.HTTP_SERVER.WS_ROOT.$row['page_slug'].'" target=_blank title="Edit" class="btn btn-info"><i class="fa fa-eye"></i></a></td>';
	
	
	$result['aaData'][] = array( "$Parent", "$Name", "$status", "$sortorder", "$Action", "$Preview");
	}
	echo json_encode($result);
 
	// First Level Sub Pages
	/*if(has_sub_pages($row['page_id'])){
		$mang .= listSubPage($row['page_id'],'-->');
	}*/
	// End First Level Sub Pages
	
	
?>


		
				