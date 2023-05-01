<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$sqlsel = $_SESSION['listSQL'];
	$queryString =  ets_db_query($sqlsel) or die(ets_db_error());	
	//$queryString =  ets_db_query("SELECT * from productOptions order by sortorder") or die(ets_db_error());	
	
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "productoptionID:".$res['productoptionID'];
			$typeID = '<td>'.$res['productoptionID'].'</td>';
			$productsType = '<td>'.getfldValue("products","productID",$res['productID'],"productTitle").'</td>';
			$productOptionTitle = '<td>'.$res['productOptionTitle'].'</td>';
			$productOptionValue = '<td>'.$res['productOptionValue'].'</td>';
			
			$Sortorder='<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
			$Status='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
				
			$Action='<td><a href="index.php?controller=products&action=productoptions&subaction=editForm&productoptionID='.$res['productoptionID'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a> |
			<a href="index.php?controller=products&action=productoptions&subaction=delete&productoptionID='.$res['productoptionID'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
			</td>';
	
			$result['aaData'][] = array( "$typeID", "$productsType", "$productOptionTitle","$productOptionValue", "$Status","$Sortorder","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>
