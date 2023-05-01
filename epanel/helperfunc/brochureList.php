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
			$brochureAction='<td><center>
			<a href="index.php?controller=brochure&action=brochure&subaction=delete&b_id='.$res['b_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
			$select='<td><center><input type="checkbox" class="case" id="'.$res['b_id'].'"></center></a></td>';
		
		
			$result['aaData'][] = array( "$select","$bname", "$bphone","$bemail","$bdate","$brochureAction");			
		}
	// End While Loop
		echo json_encode($result);
?>
