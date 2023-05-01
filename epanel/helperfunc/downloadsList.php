<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from download_brochure") or die(ets_db_error());	
	
		while($res = ets_db_fetch_array($queryString)){
			
			$pk = "BID:".$res['b_id'];

			$bname = '<td>'.$res['bname'].'</td>';	
			$bphone = '<td>'.$res['bphone'].'</td>';
			$bemail = '<td>'.$res['bemail'].'</td>';
			$bdate = '<td>'.$res['bdate'].'</td>';
			$bproject = '<td>'.$res['bproject'].'</td>';
			$brochureAction='<td><center>
			<a href="index.php?controller=projects&action=downloads_list&subaction=delete&b_id='.$res['b_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
			$select='<td><center><input type="checkbox" class="case" id="'.$res['b_id'].'"></center></a></td>';
		
		
			/*	
			$Action='<td><a href="index.php?controller=products&action=products&subaction=editForm&productID='.$res['productID'].'&pTypeID='.$res['pTypeID'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="icon-edit"></i></a> |
			<a href="index.php?controller=products&action=products&subaction=delete&productID='.$res['productID'].'&pTypeID='.$res['pTypeID'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="icon-remove"></i></a> | 
			<a href="index.php?controller=products&action=productimages&subaction=listData&productID='.$res['productID'].'" title="Add Project Images" data-toggle="tooltip" class="btn btn-info marker"><i class="icon-picture"></i></a> | 
			<a href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$res['productID'].'" title="Add Project Floor Plans" data-toggle="tooltip" class="btn btn-info marker"><i class="icon-picture"></i></a>
			</td>';
			*/
			$result['aaData'][] = array( "$select","$bname", "$bphone","$bemail","$bdate","$bproject","$brochureAction");			
		}
	// End While Loop
		echo json_encode($result);
?>
