<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from page_master order by sortorder") or die(ets_db_error());	
	
		while($res = ets_db_fetch_array($queryString)){
			$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_PAGE_IMAGE_PATH.$res['page_image']."&w=100&h=67&zc=0";
			
				$pageId='<td>'.$res['page_id'].'</td>';
				$pageTitle='<td>'.$res['page_title'].'</td>';
				$pageImage='<td><img src="'.$thumb_image.'"></td>';
				
				
//				$Action='<td><a href="index.php?controller=pages&action=pageimages&subaction=editForm&page_id='.$res['page_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
//				<a href="index.php?controller=pages&action=pageimages&subaction=delete&page_id='.$res['page_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
//				</td>';
			
			$Action='';
		
			if(strpos($_SESSION['userper'],'e') !== false) { 
				$Action.= '<td><a href="index.php?controller=pages&action=pageimages&subaction=editForm&page_id='.$res['page_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
			}


			if(strpos($_SESSION['userper'],'d') !== false) {
				$Action.= '| 
				<a href="index.php?controller=pages&action=pageimages&subaction=delete&page_id='.$res['page_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
			}
				
			$result['aaData'][] = array( "$pageId", "$pageTitle", "$pageImage", "$Action");		
		}
		echo json_encode($result);
?>