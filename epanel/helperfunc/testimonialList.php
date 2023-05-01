<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from testimonial order by sortorder") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}
		$pk = "testimonial_Id:".$res['testimonial_Id'];
		
		$testimonialID = '<td>'.$res['testimonial_Id'].'</td>';
		
		$testimonialTitle = '<td>'.$res['name'].'</td>';
		
		$testimonialTourName  = '<td>'.$res['tour_Name'].'</td>';
		
		$testimonialStatus = '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		
		$testimonialSortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
		
		$Action = '<td><a href="index.php?controller=testimonial&action=testimonial&subaction=editForm&testimonial_Id='.$res['testimonial_Id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=testimonial&action=testimonial&subaction=delete&testimonial_Id='.$res['testimonial_Id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		
		$result['aaData'][] = array( "$testimonialID","$testimonialTitle","$testimonialTourName","$testimonialStatus", "$testimonialSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>