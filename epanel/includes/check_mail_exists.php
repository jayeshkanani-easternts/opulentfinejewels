<?php	
include("configure.php");
	$sql="select * from user_master where email='".$_GET['email']."'";
	$qry = ets_db_query($sql) or die(ets_db_error().$sql);
	$email=ets_db_num_rows($qry);
	if ($email>=1){
		$errmsg = "incorrect";
	}
	else
	{
	   if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_GET['email'])){
			$errmsg = "Email Address is Invalid";
		}else{
			$errmsg = "Email Address is valid";
		}
	}
	echo $errmsg;
?>