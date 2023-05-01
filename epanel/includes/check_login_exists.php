<?php	
include("configure.php");
	$sql="select * from user_master where loginID='".$_GET['loginID']."'";
	$qry = ets_db_query($sql) or die(ets_db_error().$sql);
	$email=ets_db_num_rows($qry);
	if ($email>=1){
		$errmsg = "incorrect";
	}
	else
	{
	 
			$errmsg = "LoginID is valid";
		
	}
	echo $errmsg;
?>