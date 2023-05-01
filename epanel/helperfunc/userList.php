<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$sqlsel = $_SESSION['listSQL'];
	//$queryString =  ets_db_query("SELECT * from user_master") or die(ets_db_error());	
	$queryString =  ets_db_query($sqlsel) or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
		$pk = $res['userID'];	
		$select='<td><center><input type="checkbox" class="case" id="'.$pk.'"></center></a></td>';
		$userId = '<td>'.$res['userID'].'</td>';
			
		$loginID = '<td>'.$res['loginID'].'</td>';
		$Email = '<td>'.$res['email'].'</td>';
		$Fname = '<td>'.$res['firstname'].'</td>';
		$Lname = '<td>'.$res['lastname'].'</td>';
		$Address = '<td>'.$res['address'].'</td>';
		$Contact =	'<td>'.$res['contacts'].'</td>';
		$Action ='<td><a href="index.php?controller=user&action=user&subaction=editForm&userID='.$res['userID'].'"  title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> |<a href="index.php?controller=user&action=user&subaction=pwdForm&userID='.$res['userID'].'&loginID='.$res['loginID'].'"  title="Change Password" class="btn btn-info"><i class="fa fa-user"></i></a> | <a href="index.php?controller=user&action=user&subaction=delete&userID='.$res['userID'].'" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
			</td>';
			
		
		$result['aaData'][] = array( "$select","$userId","$loginID","$Email","$Fname","$Lname","$Address","$Contact","$Action");			
		}
	// End While Loop
		echo json_encode($result);
?>