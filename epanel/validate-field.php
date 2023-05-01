<?php 
include "includes/app_top.php";
$fldValue = trim($_REQUEST['fldValue']);
$fldName = $_REQUEST['fldName'];
$tblName = $_REQUEST['tblName'];
	$chkSql = ets_db_query("Select * from ".$tblName." where ".$fldName." = '".$fldValue."'") or die(ets_db_error());
	if(ets_db_num_rows($chkSql) > 0){
		echo $fldValue." is already in database, Duplicate entry is not allowed!!!";
	}else{
		echo "Correct";
	}
?>