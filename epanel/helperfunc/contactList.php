<?php
		require ('../includes/configure.php');
		include ('../includes/functions/general.php');
		$result = array('aaData' => array());
		$sqlsel = "SELECT * from contact_master";
		$ressql = ets_db_query($sqlsel) or die('Query failed : ' . ets_db_error());

		// Same from main controller File
			if(ets_db_num_rows($ressql) > 0) {
					while($row = ets_db_fetch_array($ressql)){ 
						$cid = $row['cid'];
						$name = $row['cname'];
						$email = $row['cemail'];	
						$phone = $row['ccontact'];	
						$subject = $row['csubject'];
						$message = $row['cmessage'];
						$cdate = date("d-m-Y H:i:s ",strtotime($row['cdate']));
						
						$contactID='<td>'.$cid.'</td>';
						
						$contactName='<td>'.$name.'</td>';
						
						$contactEmail='<td>'.$email.'</td>';
                                                
						$contactPhone='<td>'.$phone.'</td>';
						
						$contactSubject='<td>'.$subject.'</td>';
						
						$contactDate='<td>'.$cdate.'</td>';
						if(strlen($message) > 100)
						{
							$contactMessage='<td>'.mb_strimwidth($message, 0, 100, "").'<br><a class="loadModal" data-cid="'.$cid.'" data-toggle="modal" data-target="#myModal">...Read More</a></td>';
						}
						else
						{
							$contactMessage='<td>'.$message.'</td>';
						}
						
											
						$select='<td style="width:5%"><center><input type="checkbox" class="case" id="'.$cid.'"></center></td>';
//						$contactAction='<td><center>
//						<a href="index.php?controller=contact&action=contact&subaction=delete&cid='.$row['cid'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
						
						$contactAction='';
		
						if(strpos($_SESSION['userper'],'d') !== false) {
							$contactAction.= '<td><center>
						<a href="index.php?controller=contact&action=contact&subaction=delete&cid='.$row['cid'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
						}

						$result['aaData'][] = array("$select", "$contactID", "$contactDate","$contactName", "$contactEmail","$contactPhone", "$contactSubject","$contactMessage","$contactAction");
						}
							// End While Loop
							echo json_encode($result);
						}				
?>