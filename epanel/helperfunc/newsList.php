<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from news order by sortorder desc") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "news_id:".$res['news_id'];
		
				
				$NewsDate='<td>'.$res['news_date'].'</td>';
				$NewsTitle='<td>'.$res['news_title'].'</td>';
				
				$NewsStatus='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
				
				$NewsSortorder='<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
				
//				$Action='<td><a href="index.php?controller=news&action=news&subaction=editForm&news_id='.$res['news_id'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a> |
//				<a href="index.php?controller=news&action=news&subaction=delete&news_id='.$res['news_id'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
//				</td>';
		
			
				$Action='';
		
				if(strpos($_SESSION['userper'],'e') !== false) { 
					$Action.= '<td><a href="index.php?controller=news&action=news&subaction=editForm&news_id='.$res['news_id'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a>';
				}


				if(strpos($_SESSION['userper'],'d') !== false) {
					$Action.= '| <a href="index.php?controller=news&action=news&subaction=delete&news_id='.$res['news_id'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
				}
				$result['aaData'][] = array(  "$NewsDate", "$NewsTitle", "$NewsStatus","$NewsSortorder","$Action");			
		}

	// End While Loop
		echo json_encode($result);
?>