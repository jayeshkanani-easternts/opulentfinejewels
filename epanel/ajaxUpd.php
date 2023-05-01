<?php
	include "includes/app_top.php";
	/* Setting General Post Values */
	$fldValue = trim($_REQUEST['value']);
	$fldName = $_REQUEST['name'];
	$tblName = $_REQUEST['tblName'];
	/* Setting Primary Key Values */
	$pkdata = explode(":",$_POST['pk']);
	$pkfldName = trim($pkdata[0]);
	$pkfldValue = trim($pkdata[1]);
	/* Preparing Query to Update Records */
	echo $updqry = "update $tblName set $fldName = '$fldValue' where $pkfldName = '$pkfldValue' ";
	if(ets_db_query($updqry)){ return "Record Successfully Updated..."; } else { return "Error in updating record!!!"; }
?>