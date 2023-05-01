<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$sqlsel = $_SESSION['listSQL'];
	$ressql = ets_db_query($sqlsel) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {
	
		while($res = ets_db_fetch_array($ressql)){
			
			$pk = $res['s_id'];
			$sname = '<td>'.$res['s_name'].'</td>';	
			$sphone = '<td>'.$res['s_mobile'].'</td>';
			$semail = '<td>'.$res['s_email'].'</td>';
			$sdate = '<td>'.date("d-m-Y",strtotime($res['s_date'])).'</td>';
			$select='<td style="width:5%"><center><input type="checkbox" class="case" id="'.$pk.'"></center></td>';
//			$Action='<td><center>
//				<a href="index.php?controller=subscription&action=subscription&subaction=delete&sid='.$pk.'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
		
			$Action='';
		
			if(strpos($_SESSION['userper'],'d') !== false) {
				$Action.= '<td><center>
				<a href="index.php?controller=subscription&action=subscription&subaction=delete&sid='.$pk.'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
			}
			
			$result['aaData'][] = array("$select", "$sname", "$sphone","$semail","$sdate","$Action");			
		}
	// End While Loop
		echo json_encode($result);
		}
		else {
			$select = '<td></td>';	
			$sname = '<td></td>';	
			$sphone = '<td></td>';
			$semail = '<td>'.'No Result Found'.'</td>';
			$sdate = '<td></td>';
			$Action='<td></td>';
			
			$result['aaData'][] = array( "$select","$sname", "$sphone","$semail","$sdate","$Action");
			echo json_encode($result);
			}
?>
