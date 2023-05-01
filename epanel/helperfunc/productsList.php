<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$sqlsel = $_SESSION['listSQL'];
	$queryString =  ets_db_query($sqlsel) or die(ets_db_error());
	//$queryString =  ets_db_query("SELECT * from products where pTypeID = '".(int)$_REQUEST['pTypeID']."' order by sortorder") or die(ets_db_error());
// 	echo"234";
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "productID:".$res['productID'];
			$productsID = '<td>'.$res['productID'].'</td>';
			$productsType = '<td>'.getfldValue("producttype","pTypeID",$res['pTypeID'],"pTypeTitle").'</td>';
			$productsLocation = '<td>'.$res['productStatus'].'</td>';
			$productsName = '<td>'.$res['productTitle'].'</td>';
			
			$Sortorder='<td><a href="#" class="esortorder" data-type="text" data-value = "'.$res['sortorder'].'" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
			$Status='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
			
			
				
			$Action='<td><a href="index.php?controller=products&action=products&subaction=editForm&productID='.$res['productID'].'&pTypeID='.$res['pTypeID'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a> |
			<a href="index.php?controller=products&action=products&subaction=delete&productID='.$res['productID'].'&pTypeID='.$res['pTypeID'].'" title="Delete Records" data-toggle="tooltip" class="btn btn-danger marker" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> | 
			<a href="index.php?controller=products&action=productimages&subaction=listData&productID='.$res['productID'].'" title="Add Project Slider Images" data-toggle="tooltip" class="btn btn-info marker"><i class="fa fa-picture-o"></i></a> | 
			<a href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$res['productID'].'" title="Add Project Floor Plans" data-toggle="tooltip" class="btn btn-info marker"><i class="fa fa-picture-o"></i></a> | 
				<a href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$res['productID'].'" title="Add Project Gallery" data-toggle="tooltip" class="btn btn-info marker"><i class="fa fa-camera"></i></a> 
			</td>';
	
			$result['aaData'][] = array( "$productsID", "$productsType","$productsName",  "$productsLocation", "$Status","$Sortorder","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>
