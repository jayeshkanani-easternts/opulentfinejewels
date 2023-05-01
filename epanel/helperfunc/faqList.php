<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from faq order by sortorder") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}
		$pk = "faq_Id:".$res['faq_Id'];
		
		$faqID = '<td>'.$res['faq_Id'].'</td>';
		
		$faqTitle = '<td>'.$res['name'].'</td>';
		
		$faqReview = '<td>'.$res['review'].'</td>';
		$ID = $res['faq_Id'];
		
		if(strlen($faqReview) > 100)
		{
			$faqMessage='<td>'.mb_strimwidth($faqReview, 0, 100, "").'<br><a class="loadModal" data-fid="'.$ID.'" data-toggle="modal" data-target="#myModal">...Read More</a></td>';
		}
		else
		{
			$faqMessage='<td>'.$faqReview.'</td>';
		}
		
		
		$faqStatus = '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		
		$faqSortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
		
		$Action = '<td><a href="index.php?controller=faq&action=faq&subaction=editForm&faq_Id='.$res['faq_Id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=faq&action=faq&subaction=delete&faq_Id='.$res['faq_Id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		
		$result['aaData'][] = array( "$faqID","$faqTitle","$faqMessage","$faqStatus", "$faqSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>